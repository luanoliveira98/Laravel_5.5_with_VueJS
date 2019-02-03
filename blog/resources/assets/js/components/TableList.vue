<template>
    <div>
        <a href="#">Create</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th v-for="title in titles">{{title}}</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Title...</td>
                    <td>Description...</td>
                    <td>Author...</td>
                    <td>Date...</td>
                    <td>
                        <a href="#">Edit</a> | 
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Title...</td>
                    <td>Description...</td>
                    <td>Author...</td>
                    <td>Date...</td>
                    <td>
                        <a href="#">Edit</a> | 
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Title...</td>
                    <td>Description...</td>
                    <td>Author...</td>
                    <td>Date...</td>
                    <td>
                        <a href="#">Edit</a> | 
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Title...</td>
                    <td>Description...</td>
                    <td>Author...</td>
                    <td>Date...</td>
                    <td>
                        <a href="#">Edit</a> | 
                        <a href="#">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles']
    }
</script>
