<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Vue Example</title>
    <script src="https://use.fontawesome.com/5e17fffd96.js"></script>
  </head>
  <body>
      <div id="vue-app" class="container">

        <h3> Tereas </h3>

        <ul class="list-group task">
            <li v-for="(tarea, index) in tareas" class="list-group-item">
            <a  @click="toggleStatus(tarea)" ><span class="fa" :class="tarea.pendiente?'fa-square-o':'fa-check-square-o'" ></span></a>
            

              <template v-if="!tarea.editando">
                
                &nbsp&nbsp<span>{{tarea.descripcion}}</span> 

                <div>
                  &nbsp&nbsp
                  <a  @click="editarTarea(tarea)"  ><span class="fa fa-edit" ></span></a>
                  &nbsp&nbsp
                  <a @click="eliminarTarea(index)" ><span class="fa fa-trash" ></span></a>
                  </li>
                </div>

              </template>

              <template v-else>
                
                <input type="text" class="form-control" @keypress.enter="actualizarTarea(tarea)" @keydown.esc="cancelarTarea(tarea)" name="" v-model="tarea_backup">

                <div>
                 
                  <a @click="actualizarTarea(tarea)"><span class="fa fa-check" ></span></a>
                  &nbsp&nbsp
                  <a @click="cancelarTarea(tarea)" ><span class="fa fa-close" ></span></a>
                  </li>
                </div> 
              </template>

              
            
           
        </ul>
        <br>
        <button class="btn btn-danger" type="button" @click="borrarTareas"> Borrar Todo </button>


        <form @submit.prevent="crearTarea">
          <br>
          <input v-model="nueva_tarea" ype="text"  name="" class="form-control">
          <br>
          <button  type="submit" class="btn btn-primary">Crear Tarea</button>
          
        </form>
      </div>

  <script src="build/app.js"></script>

  </body>
</html>
