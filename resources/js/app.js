require('./bootstrap');
import interact from 'interactjs';
import { SVG } from '@svgdotjs/svg.js';
import * as joint from '@joint/core';
// Torne-as disponíveis globalmente (opcional)
window.interact = interact;
window.SVG = SVG;
window.joint = joint; // Torna o JointJS globalmente acessível
