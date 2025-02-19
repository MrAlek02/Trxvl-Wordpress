<?php

require_once 'types/Schema.php';
require_once 'types/ItemList.php';
require_once 'types/CollectionPage.php';
require_once 'types/Article.php';
require_once 'types/PostalAddress.php';
require_once 'types/SearchAction.php';
require_once 'types/WebSite.php';
require_once 'types/WebPage.php';
require_once 'types/Organization.php';
require_once 'types/LocalBusiness.php';

$address = new PostalAddress([
  'addressLocality' => 'Novi Sad',
  'postalCode' => '21000',
  'streetAddress' => 'Braće Ribnikar 29/29',
  'addressCountry' => 'Serbia'
]);

$potentialAction = new SearchAction([
  'target' => [
    '@type' => 'EntryPoint',
    'urlTemplate' => Schema::currentUrl().'?s={search_term_string}',
  ],
  'query-input' => [
    '@type' => 'PropertyValueSpecification',
    'valueRequired' => 'http://schema.org/True',
    'valueName' => 'search_term_string',
  ]
]);

$organization = new Organization([
  'logo' => get_template_directory_uri().'/assets/images/logo.png',
  'address' => $address,
  'potentialAction' => $potentialAction,
  'email' => 'office(at)tim-inzenjering.com',
  'telephone' => ['+381-21-6420-490', '+381-64-933-1595'],
  'name' => get_option('blogname'),
]);

$localBusiness = new LocalBusiness([
  'name' => get_option('blogname'),
  'image' => get_template_directory_uri().'/assets/images/logo.png',
  'telephone' => ['+381-21-6420-490', '+381-64-933-1595'],
  'address' => $address,

  // 'headline' => get_field('naslov'),
  // 'description'  => str_replace("\n", ' ', strip_tags(get_field('opis'))),
  // 'copyrightHolder' => $organization,
]);



/*Homepage start*/
if (is_page(get_option('page_on_front'))) {

  echo $localBusiness;

  echo new WebSite([
    'name' => get_option('blogname'),
    'headline' => get_option('blogname'),
    'description'  => str_replace("\n", ' ', strip_tags(get_field('opis'))),
    'inLanguage' => Schema::currentLanguage(),
    'copyrightHolder' => $organization,
  ]);

} elseif (is_page(17)) { // About

  $words = explode(' ', str_replace("\n", ' ', strip_tags(get_field('tekst'))));

  echo new WebPage([
    'name' => get_the_title() . ' - ' . get_option('blogname'),
    'description' => implode(' ', array_slice($words, 0, 30)),
    'potentialAction' => $potentialAction,
    'inLanguage' => Schema::currentLanguage()
  ]);

} elseif (is_page(15)) { // Vesti

  echo new WebPage([
    'name' => get_the_title() . ' - ' . get_option('blogname'),
    'potentialAction' => $potentialAction,
    'description' => get_field('naslov'),
    'inLanguage' => Schema::currentLanguage()
  ]);

} elseif (is_page(19)) { // Kontakt

  echo $localBusiness;

} elseif (is_page(11)) { // Prodaja stanova

  $collectionPage = new CollectionPage([
    'name' => get_the_title() . ' - ' . get_option('blogname'),
    'description' => get_field('naslov'),
  ]);

  $query = new WP_Query(['post_type' => 'stan', 'posts_per_page' => -1]);

  while ($query->have_posts()) { $query->the_post();
    $collectionPage->addItem(new WebPage([
      'url' => get_the_permalink(),
      'name' => get_the_title(),
      'description' => get_the_title(),
      'image' => get_field('mala_slika') ? get_field('mala_slika')['url'] : get_template_directory_uri() .'/assets/images/logo.png',
    ]));
  }

  wp_reset_query();

  echo $collectionPage;

} elseif (is_page(13)) { // Objekti

  $collectionPage = new CollectionPage([
    'name' => get_the_title() . ' - ' . get_option('blogname'),
    'description' => get_field('naslov'),
  ]);

  $query = new WP_Query([
    'post_type' => 'objekat',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'tax_query' => ['taxonomy' => 'zgradegoriesa', 'field' => 'slug', 'terms' => 'zavrseno']
  ]);

  while ($query->have_posts()) { $query->the_post();
    $collectionPage->addItem(new WebPage([
      'url' => get_the_permalink(),
      'name' => get_the_title(),
      'description' => get_the_title(),
      'image' => get_field('mala_slika') ? get_field('mala_slika')['url'] : get_template_directory_uri() .'/assets/images/logo.png',
    ]));
  }

  wp_reset_query();

  echo $collectionPage;

} elseif (is_singular('vest')) {

  $words = explode(' ', str_replace("\n", ' ', strip_tags(get_field('tekst'))));

  echo new Article([
    'name' => get_the_title(),
    'headline' => get_the_title(),
    'description' => implode(' ', array_slice($words, 0, 30)),
    'datePublished' => get_the_date('c'),
    'dateModified' => get_the_modified_date('c'),
    'author' => get_option('blogname'),
    'publisher' => $localBusiness,
    'mainEntityOfPage' => [
      '@type' => 'WebPage',
      '@id' => Schema::currentUrl()
    ],
    'image' => [get_field('mala_slika') ? get_field('mala_slika')['url'] : get_template_directory_uri() .'/assets/images/logo.png']
  ]);

}
