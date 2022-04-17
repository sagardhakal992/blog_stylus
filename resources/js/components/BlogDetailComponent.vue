<template>
<AppLayout>
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <img :src="blog.image_url" title="" alt="" />
                        </div>
                        <div class="article-title">

                            <h2>{{blog.title}}</h2>
                            <div class="media">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <label>Rachel Roth</label>
                                    <span>26 FEB 2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                           {{blog.contents}}
                        </div>
                    </article>

                </div>


        </div>
    </div>
    </div>
</AppLayout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout";
export default {
    name: "BlogDetailComponent",
    components: {AppLayout},
    props:{
        blog:Object
    }
}
</script>

<style scoped>

</style>
