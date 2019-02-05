<template>
    <div :class="'col-sm-' + (sm || '6') + ' col-md-' + (md || '4')">
        <div class="thumbnail">
        <img :src="image" alt="...">
        <div class="caption">
            <small>{{date}} - {{author}}</small>
            <h3>{{title}}</h3>
            <p>{{description}}</p>
            <p><a :href="link" class="btn btn-primary" role="button">Read more</a></p>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['title', 'description', 'link', 'image', 'date', 'author', 'sm', 'md']
    }
</script>
