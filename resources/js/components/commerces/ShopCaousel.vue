<template>
  <div>
    <slick-carousel :options="slickOptions">
      <div v-for="image in images" :key="image.id">
        <img :src="image.src" :alt="image.alt" />
      </div>
    </slick-carousel>
  </div>
</template>
  
  <script>
export default {
  data() {
    return {
      slickOptions: {
        autoplay: true,
        autoplaySpeed: 2000, // Change the speed as needed
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
      },
      images: [
        { id: 1, src: "default_shop.jpg", alt: "defaul shop" },
        { id: 2, src: "default_shop.jpg", alt: "defaul shop" },
        { id: 3, src: "default_shop.jpg", alt: "defaul shop" },
        // Add more images as needed
      ],
    };
  },
};
</script>
  <style>
.carousel-container {
  width: 80%;
  margin: auto;
}

.carousel-item {
  text-align: center;
  padding: 20px;
  border: 1px solid #ccc;
}
</style>