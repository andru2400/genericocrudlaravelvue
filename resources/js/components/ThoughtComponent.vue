<template>   
            <div class="card my-2">
                <div class="card-header">
                   {{ thought.created_at }} - última actualización {{ thought.updated_at }}
                </div>
                <div class="card-body"> 
                    <input v-if="editMode" type="text" name="" class="form-control" v-model="thought.description">
                    <p v-else >{{ thought.description}}</p>
                </div>
                <div class="card-footer">
                    <button v-if="editMode" class="btn btn-primary" v-on:click="onclickUpdate()">Guardar Cambios</button>
                    <button v-else class="btn btn-primary" v-on:click="onclickEdit()">Editar</button>
                    <button class="btn btn-danger" v-on:click="onclickDelete()">Eliminar</button>                    
                </div>                
            </div>    
</template>

<script>
    export default {
        props: ['thought'],
        data(){
            return {
                editMode: false 
            }                        
        },
        mounted(){
            console.log('Component mounted.')
        },
        methods:{
            onclickDelete(){
                 axios.delete(`/thoughts/${this.thought.id} `).then(() => {                    
                    this.$emit('delete');    
                });
            },
            onclickEdit(){
                this.editMode = true;
            },
            onclickUpdate(){
                const params = {
                    description:this.thought.description
                };
                axios.put(`/thoughts/${this.thought.id}`,params).then((response) => {
                    this.editMode = false;
                    const thought = response.data;
                    this.$emit('update', thought);    
                });                                
            }
        }
    }
</script>
