import PhotoSwipeLightbox from 'photoswipe/lightbox';
import "/resources/css/photoswipe.css";

const lightbox = new PhotoSwipeLightbox({
  gallery: '#gallery',
  children: 'a',
  initialZoomLevel: 'fit',
  pswpModule: () => import('photoswipe')
});
lightbox.init();