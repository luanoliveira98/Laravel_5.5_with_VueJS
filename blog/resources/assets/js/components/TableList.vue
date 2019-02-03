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
                <tr v-for="item, index in itens">
                    <td v-for="i in item">{{i}}</td>
                    <td v-if="detail || edit || deleted">
                        <form v-bind:id="index" v-if="deleted && token" v-bind:action="deleted" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">
                            <a v-if="detail" v-bind:href="detail">Detail | </a>
                            <a v-if="edit" v-bind:href="edit">Edit | </a> 
                            <a v-on:click="executeForm(index)">Delete</a>
                        </form>
                        <span v-if="!token">
                            <a v-if="detail" v-bind:href="detail">Detail | </a>
                            <a v-if="edit" v-bind:href="edit">Edit | </a> 
                            <a v-if="deleted" v-bind:href="deleted"></a>
                        </span>
                        <span v-if="token && !deleted">
                            <a v-if="detail" v-bind:href="detail">Detail | </a>
                            <a v-if="edit" v-bind:href="edit">Edit</a>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles', 'itens', 'create', 'detail', 'edit', 'deleted', 'token'],
        methods:{
            executeForm: function(index){
                document.getElementById(index).submit();
            }
        }
    }
</script>
