// Canterbury — front-end behaviour.
//
// Only the parts that do not depend on church.config.json: the theme toggle,
// the mobile navigation and the scroll reveal. Everything the browser used to
// hydrate from that file is rendered by PHP from the Customizer instead, and
// WordPress marks the current menu item itself.
import { initTheme, initPorch } from './ui.js';
import { initReveal } from './reveal.js';

initTheme();
initPorch();
initReveal();
