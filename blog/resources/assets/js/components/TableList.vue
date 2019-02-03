<template>
    <div>
        <a v-if="create" v-bind:href="create">Create</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="title in titles">{{title}}</th>
                    <th v-if="detail || edit || deleted">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in itens">
                    <td v-for="i in item">{{i}}</td>
                    <td v-if="detail || edit || deleted">
                        <form v-if="deleted && token" action="" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">
                            <a v-if="detail" v-bind:href="detail">Detail | </a>
                            <a v-if="edit" v-bind:href="edit">Edit | </a> 
                            <a v-if="deleted" v-bind:href="deleted">Delete</a>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'itens', 'create', 'detail', 'edit', 'deleted', 'token']
    }
</script>
