<template>
    <Head title=" test e-Commerce HTML Template"></Head>
    <section id="wsus__banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__banner_content">
                        <div class="row banner_slider">
                                <div v-for="slider in sliders" :key="slider.id" class="col-xl-12">
                                    <div class="wsus__single_slider" :style="{'background': 'url('+slider.banner+')'}" >
                                        <div class="wsus__single_slider_text">
                                            <h3>{{ slider.type }}</h3>
                                            <h1>{{ slider.title }}</h1>
                                            <h6>start at {{slider.starting_price}}</h6>
                                            <a class="common_btn" :href="slider.btn_url">shop now</a>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script setup>
import { usePage, Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const {    
    sliders,
    } = usePage().props;

    onMounted(() => {
        $('.banner_slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 4000,
            dots: true,
            arrows: false,
        });
        
    });

</script>

<style></style>