#!/usr/bin/env node

const fs = require("fs");
const [, , ...args] = process.argv;
const templatesFolder = "./templates/";
const templatePartsFolder = "./template-parts/";
const dotenv = require("dotenv");

dotenv.config();

const type = args.shift();
const themeType = process.env.THEME_TYPE;

console.log(themeType);

const generatePage = (pageName) => {
  let pageFolder;

  if (themeType === "templates") pageFolder = `${templatesFolder}${pageName}/`;
  if (themeType === "blocks" || themeType === "default") pageFolder = templatesFolder;

  const pageNameFormated = pageName
    .split("-")
    .map((word) => {
      return word.charAt(0).toUpperCase() + word.slice(1);
    })
    .join(" ");

  console.log(`Creating ${pageName} page...`);

  // check if ./templates exist. If not then create ./templates directory.
  if (!fs.existsSync(templatesFolder)) {
    console.log(`${templatesFolder} not found. Creating ${templatesFolder}`);
    fs.mkdirSync(templatesFolder, { recursive: true });
  }

  if (themeType === "templates") {
    // check if folder for that page exist. If not then create it.
    if (!fs.existsSync(pageFolder)) {
      fs.mkdirSync(pageFolder, { recursive: true });
      console.log(`Created ${pageFolder} folder`);
    }
  }

  // Create php file for that page.
  if (!fs.existsSync(`${pageFolder}${pageName}.php`)) {
    fs.appendFileSync(
      `${pageFolder}${pageName}.php`,
      `<?php\n/* Template Name: ${pageNameFormated} */\n\nget_header();?>\n\n<div class="${pageName}">\n\n\t<?php\n\n\t\t/* Template Parts */\n\n\t?>\n\n</div>\n\n<?php get_footer();`
    );
    console.log(`Created ${pageFolder}${pageName}.php`);
  } else {
    console.log(`${pageFolder}${pageName}.php already exists`);
  }

  if (themeType === "templates") {
    // Create scss file for that page.
    if (!fs.existsSync(`${pageFolder}${pageName}.scss`)) {
      fs.appendFileSync(`${pageFolder}${pageName}.scss`, "");
      console.log(`Created ${pageFolder}${pageName}.scss`);
    } else {
      console.log(`${pageFolder}${pageName}.scss already exists`);
    }
  }
};

const generateComponent = (componentName, pageName) => {
  const componentFolder = `${templatePartsFolder}${componentName}/`;

  let pageFolder;

  if (themeType === "templates") pageFolder = `${templatesFolder}${pageName}/`;
  if (themeType === "blocks" || themeType === "default") pageFolder = templatesFolder;

  if (!pageName) {
    console.log("Warning: Page name not found! Component files won't be imported!");
  }

  if (!fs.existsSync(`${pageFolder}${pageName}.php`) && pageName) {
    console.log("asdasdasdasd");
    generatePage(pageName);
  }

  console.log(`Creating ${componentName} component...`);

  // check if ./template-parts exist. If not then create ./template-parts directory.
  if (!fs.existsSync(templatePartsFolder)) {
    console.log(`${templatePartsFolder} not found. Creating ${templatesFolder}`);
    fs.mkdirSync(templatePartsFolder, { recursive: true });
  }

  // check if folder for that component exist. If not then create it.
  if (!fs.existsSync(componentFolder)) {
    fs.mkdirSync(componentFolder, { recursive: true });
    console.log(`Created ${componentFolder} folder`);
  }

  // Create php file for that component.
  if (!fs.existsSync(`${componentFolder}${componentName}.php`)) {
    fs.appendFileSync(`${componentFolder}${componentName}.php`, `<section class="${componentName}">\n\t${componentName} component\n</section>`);
    console.log(`Created ${componentFolder}${componentName}.php`);
  } else {
    console.log(`${componentFolder}${componentName}.php already exists`);
  }

  // Create scss file for that component.
  if (!fs.existsSync(`${componentFolder}${componentName}.scss`)) {
    fs.appendFileSync(`${componentFolder}${componentName}.scss`, `.${componentName} {\n\n}`);
    console.log(`Created ${componentFolder}${componentName}.scss`);
  } else {
    console.log(`${componentFolder}${componentName}.scss already exists`);
  }

  //Update page PHP file
  if (fs.existsSync(`${pageFolder}${pageName}.php`)) {
    const contents = fs.readFileSync(`${pageFolder}${pageName}.php`, "utf8");
    const fileContent = contents.split("\n");
    let lastTemplatePartIndex;
    let templatePartsPlacehoder;
    for (var i = 0; i < fileContent.length; i++) {
      let hasTemplatePart = fileContent[i].includes("get_template_part");
      templatePartsPlacehoder = fileContent[i].includes("/* Template Parts */");
      if (templatePartsPlacehoder) {
        fileContent[i] = `\t\tget_template_part( '${componentFolder}${componentName}' );`;
        break;
      }
      if (hasTemplatePart) {
        lastTemplatePartIndex = i;
      }
    }
    let newContent;
    if (templatePartsPlacehoder) {
      newContent = fileContent.join("\n");
    } else {
      fileContent.splice(lastTemplatePartIndex + 1, 0, `\t\tget_template_part( '${componentFolder}${componentName}' );`);
      newContent = fileContent.join("\n");
    }

    fs.writeFileSync(`${pageFolder}${pageName}.php`, newContent);
    console.log(`${pageFolder}${pageName}.php updated`);
  }

  if (themeType === "default") {
    //Update style SCSS file
    if (fs.existsSync(`./src/scss/style.scss`)) {
      fs.appendFileSync(`./src/scss/style.scss`, `@import '../../${componentFolder}${componentName}';\n`);
      console.log(`Updated style.scss`);
    }
  }

  if (themeType === "templates") {
    //Update page SCSS file
    if (fs.existsSync(`${pageFolder}${pageName}.scss`)) {
      fs.appendFileSync(`${pageFolder}${pageName}.scss`, `@import '../.${componentFolder}${componentName}';\n`);
      console.log(`Updated ${pageFolder}${pageName}.scss`);
    }
  }
};

const reservedNames = [
  "front-page",
  "author",
  "category",
  "taxonomy",
  "date",
  "tag",
  "attachment",
  "single-post",
  "archive",
  "single",
  "page",
  "home",
  "404",
  "search",
  "singular",
  "index",
];

if (type === "p" || type === "page") {
  args.forEach((arg) => {
    const indexOfArg = reservedNames.includes(arg);
    if (!indexOfArg) {
      generatePage(arg);
    } else {
      console.log(`${arg} is a reserved word`);
    }
  });
} else if (type === "c" || type === "component") {
  if (args.length === 1) {
    generateComponent(args[0], null);
  } else {
    pageName = args.pop();
    if (pageName === "--no-page") {
      pageName = null;
    }
    args.forEach((arg) => {
      generateComponent(arg, pageName);
    });
  }
}
