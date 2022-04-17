<template>
<app-layout>

      <div class="max-w-5xl mx-auto grid grid-cols-3    ">

          <div v-for="item in blogs" class="card" style="width: 18rem;">
              <img :src="item.image_url" class="card-img-top" alt="...">
              <div class="card-body">
                  <h5 class="card-title">{{item.title}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a :href="'/blogs/detail/'+item.id" class="btn btn-primary">View Detail</a>
              </div>
          </div>
      </div>

</app-layout>
</template>

<script>
import Welcome from "../Jetstream/Welcome";
import AppLayout from "../Layouts/AppLayout";
export default {
    name: "Home",
    components: {AppLayout, Welcome},
    props:{
        blogs:[]
    },
    data(){
        return {}
    },
    methods:{
       deleteItem(id)
       {
           this.$inertia.delete(`/blogs/delete/${id}`);
       }
    }
}
</script>

<style scoped>

</style>
