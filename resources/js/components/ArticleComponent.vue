<template>
    <div class="article-component" mt-4>
        <h4>{{title}}</h4>
        <p>{{text}}</p>
        <small>{{author}}</small>
        <hr>
    </div>
</template>

<script>
export default {
 props:['title','text','author']

}

</script>

<style lang="scss" scoped>

.article-component{
    h4{
        color: red;
    }

}

</style>