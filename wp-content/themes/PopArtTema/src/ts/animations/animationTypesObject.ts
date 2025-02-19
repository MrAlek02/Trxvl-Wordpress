type Animation = {
  from: gsap.TweenVars;
  to: gsap.TweenVars;
};

type AnimationTypesObject = {
  [animationName: string]: Animation;
};

export const animationTypesObject: AnimationTypesObject = {
  drawSvg: {
    from: { opacity: 1, strokeDashoffset: 500, strokeWidth: 4 },
    to: { opacity: 1, strokeDashoffset: 0 }
  },
  left: {
    from: { x: '-200px' },
    to: { x: '0' }
  },

  left100: {
    from: { x: '-100px' },
    to: { x: '0' }
  },
  left50: {
    from: { x: '-50px' },
    to: { x: '0' }
  },
  leftWithScale: {
    from: { x: '-50px', scale: 0.75 },
    to: { x: '0', scale: 1 }
  },
  right: {
    from: { x: '200px' },
    to: { x: '0' }
  },
  right50: {
    from: { x: '50px' },
    to: { x: '0' }
  },
  rightWithScale: {
    from: { x: '50px', scale: 0.75 },
    to: { x: '0', scale: 1 }
  },
  top: {
    from: { y: '-100px' },
    to: { y: '0' }
  },
  bottom: {
    from: { y: '50px' },
    to: { y: '0' }
  },
  scaleX: {
    from: { transformOrigin: 'left', opacity: 1, scaleX: 0 },
    to: { scaleX: 1 }
  },
  scaleXRightOrigin: {
    from: { transformOrigin: 'right', opacity: 1, scaleX: 0 },
    to: { scaleX: 1 }
  },
  scaleX04RightOrigin: {
    from: { transformOrigin: 'right', opacity: 1, scaleX: 0 },
    to: { scaleX: 1 }
  },
  bottomWithScale: {
    from: { y: '50px', scale: 0.75 },
    to: { y: '0', scale: 1 }
  },
  bottomRightUp: {
    from: { x: '50%', y: '100px', skewY: '15deg' },
    to: { x: '0', y: '0', skewY: '0' }
  },
  revealLeft: {
    from: { opacity: 1, clipPath: 'polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)' },
    to: { clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)' }
  },
  revealRight: {
    from: {
      opacity: 1,
      clipPath: 'polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)'
    },
    to: { clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)' }
  },
  revealTop: {
    from: { opacity: 1, clipPath: 'polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)' },
    to: { clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)' }
  },
  revealBottom: {
    from: {
      opacity: 1,
      clipPath: 'polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)'
    },
    to: { clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)' }
  },
  slideUp: {
    from: { y: '100px', skewY: '6deg' },
    to: { y: '0', skewY: '0' }
  },
  slideUpRight: {
    from: { y: '100px', x: '100px', rotateZ: '13deg', scale: 0.4 },
    to: { y: '0', x: '0', rotateZ: '0', scale: 1 }
  },
  scaleUp: {
    from: { scale: 0 },
    to: { scale: 1 }
  },
  spinUp: {
    from: { y: '100px', rotateY: '720deg' },
    to: { y: '0', rotateY: '0' }
  },
  rotateIn: {
    from: { scale: 0, rotate: '45deg' },
    to: { scale: 1, rotate: '0deg' }
  },
  zoomOutBig: {
    from: { scaleX: 3, scaleY: 3, x: '200%', y: '-200%' },
    to: { scaleX: 1, scaleY: 1, x: '0', y: '0' }
  },
  zoomOutSmall: {
    from: { scaleX: 2.4, scaleY: 2.4, x: '-10%', y: '-100%' },
    to: { scaleX: 1, scaleY: 1, x: '0', y: '0' }
  },
  zoomInBig: {
    from: { scaleX: 0, scaleY: 0, x: '-200%', y: '200%' },
    to: { scaleX: 1, scaleY: 1, x: '0', y: '0' }
  },
  circleOut: {
    from: { clipPath: 'circle(0% at 50% 50%)' },
    to: { clipPath: 'circle(70.7% at 50% 50%)' }
  },
  fadeIn: {
    from: { opacity: 0 },
    to: { opacity: 1 }
  },
  froyoFadeUp: {
    from: { y: '30px' },
    to: { y: 0 }
  },
  froyoFadeDown: {
    from: { y: '-30px' },
    to: { y: 0 }
  },
  froyoFadeDownVendiSuite: {
    from: { y: '-30px' },
    to: { y: 0 }
  },

  froyoFadeLeft: {
    from: { x: '-20px' },
    to: { x: 0 }
  },
  froyoFadeRight: {
    from: { x: '20px' },
    to: { x: 0 }
  },
  rollLeft: {
    from: { x: '400%', rotation: 360, opacity: 0 },
    to: { x: 0, rotation: 0, opacity: 1 }
  },
  rollRight: {
    from: { x: '-400%', rotation: -360 },
    to: { x: 0, rotation: 0 }
  },
  test: {
    from: {
      clipPath: 'polygon(50% 0%, 0% 100%, 100% 100%)'
    },
    to: {
      clipPath:
        'polygon(10% 25%, 35% 25%, 35% 0%, 65% 0%, 65% 25%, 90% 25%, 90% 50%, 65% 50%, 65% 100%, 35% 100%, 35% 50%, 10% 50%)'
    }
  }
};
