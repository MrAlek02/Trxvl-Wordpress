<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing main tag.
 */

?>

</main>

<?php get_template_part( './template-parts/footer/footer' ); ?>

<script>
if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = Array.prototype.forEach;
}

Number.isNaN = Number.isNaN || function isNaN(input) {
    return typeof input === 'number' && input !== input;
}

// create script that will load polyfills
var script = document.createElement('script');
script.id = "myPolyfylls";
document.querySelector('body').insertAdjacentElement('beforeend', script);

var features = [];

// check if some features are missing and add them to the features list
if (!('IntersectionObserver' in window) ||
    !('IntersectionObserverEntry' in window) ||
    !('intersectionRatio' in window.IntersectionObserverEntry.prototype)) {
    // features.push("IntersectionObserver");
    features.push('npm/intersection-observer/intersection-observer.min.js');
}

if (!('Promise' in window)) {
    features.push("npm/promise-polyfill/dist/polyfill.min.js");
}

if (!window.fetch) {
    features.push('npm/fetch/lib/fetch.min.js');
}

if (!("scrollBehavior" in document.documentElement.style)) {
    features.push("npm/smooth-scroll/dist/smooth-scroll.polyfills.min.js");
}

// create source for script
const source = 'https://cdn.jsdelivr.net/combine/' + features.join(",");

// if some features are missing add source to the script
if (features.length > 0) {
    script.src = source;
    window.loadingPolyfills = true;
    script.onload = function() {
        window.loadedPolyfills = true;
    }
}
</script>
<?php wp_footer(); ?>

</body>

</html>