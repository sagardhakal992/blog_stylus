<template>
<AppLayout>
    <BlogCreateForm></BlogCreateForm>
</AppLayout>
</template>

<script>
import AppLayout from '../Layouts/AppLayout'
import BlogCreateForm from "../components/BlogCreateForm";
export default {
    name: "BlogCreatePage",
    components: {BlogCreateForm, AppLayout}

}
</script>

<style scoped>

</style>
