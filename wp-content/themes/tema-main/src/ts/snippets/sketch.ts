//@ts-nocheck
import { PerspectiveCamera, Scene, WebGLRenderer, Mesh, SphereBufferGeometry, ShaderMaterial, TextureLoader, Vector2 } from "three";
import fragment from "../../shaders/fragment.glsl";
import vertex from "../../shaders/vertex.glsl";
// import testTexture from './water.jpg';

type Options = {
  domElement: HTMLElement;
};

export default class Sketch {
  constructor(options: Options) {
    this.container = options.domElement;
    this.width = this.container.offsetWidth;
    this.height = this.container.offsetHeight;

    this.camera = new PerspectiveCamera(70, this.width / this.height, 0.01, 10);
    this.camera.position.z = 1;

    this.scene = new Scene();

    this.renderer = new WebGLRenderer({
      antialias: true,
      alpha: true,
    });
    this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    this.container.appendChild(this.renderer.domElement);

    this.time = 0;
    this.resize();
    this.addObjects();
    this.render();

    this.setupResize();
  }

  resize() {
    this.width = this.container.offsetWidth;
    this.height = this.container.offsetHeight;
    this.renderer.setSize(this.width, this.height);
    this.camera.aspect = this.width / this.height;
    this.camera.updateProjectionMatrix();
  }

  setupResize() {
    window.addEventListener("resize", this.resize.bind(this));
  }

  addObjects() {
    this.geometry = new SphereBufferGeometry(0.5, 60, 60);
    this.material = new ShaderMaterial({
      wireframe: true,
      uniforms: {
        time: { value: 1.0 },
        resolution: { value: new Vector2() },
      },
      vertexShader: vertex,
      fragmentShader: fragment,
    });

    this.mesh = new Mesh(this.geometry, this.material);
    this.scene.add(this.mesh);
  }

  render() {
    this.time += 0.05;
    this.material.uniforms.time.value = this.time;
    this.mesh.rotation.x = this.time / 100;
    this.mesh.rotation.y = this.time / 50;

    this.renderer.render(this.scene, this.camera);

    requestAnimationFrame(this.render.bind(this));
  }
}
