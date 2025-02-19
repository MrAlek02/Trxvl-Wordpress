import slider from './components/slider';
import navigation from './components/navigation';
import calendar from './components/calendar';
import animations from './animations/animations';
import animationsCategory from './animations/animationsCategory';

declare global {
  interface Window {
    globals: {
      ajax_url: string;
      home_url: string;
    };
    loadingPolyfills: boolean;
    loadedPolyfills: boolean;
  }
}

window.globals = JSON.parse(document.body.dataset.globals);

const init = () => {
  slider();
  navigation();
  calendar();
  animations();
  animationsCategory();
};

if (window.loadingPolyfills) {
  // polyfills are required
  const script = document.querySelector('#myPolyfylls')! as HTMLScriptElement;
  if (window.loadedPolyfills) {
    // polyfills are already loaded
    init();
  } else {
    // wait for polyfills to load
    script.onload = () => {
      init();
    };
  }
} else {
  // polyfills are not required
  init();
}

//ensure that the current page is initialized on browsers that have back-forward cache
window.addEventListener('pageshow', (event) => {
  if (event.persisted) init();
});
