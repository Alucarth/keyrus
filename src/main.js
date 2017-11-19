import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);


var vue = new Vue({
  el: '#vue-app',
  methods:{
  	crearTarea: function(){
  		this.tareas.push({
  			descripcion: this.nueva_tarea,
  			pendiente: true,
  			editando: false
  		});

  		this.nueva_tarea='';
  	},
  	toggleStatus: function(tarea){
  		tarea.pendiente =!tarea.pendiente;

  	},
  	editarTarea: function(tarea){
  		this.tareas.forEach(function(tarea){
  		tarea.editando=false;
  			
  		});
  		this.tarea_backup=tarea.descripcion;
  		tarea.editando=true;
  	},
  	cancelarTarea: function(tarea){
  		tarea.editando=false;
  	},
  	actualizarTarea: function(tarea){
  		
  		tarea.descripcion = this.tarea_backup;
  		tarea.editando = false;

  	},
  	eliminarTarea: function(index){
  		this.tareas.splice(index,1);
  	},
  	borrarTareas: function(){
  		this.tareas = this.tareas.filter(function(tarea){
  			return tarea.pendiente;
  		});
  	}

  },
  data:{
  	nueva_tarea: '',
  	tarea_backup: '',
  	tareas: [
  		{
	  		descripcion:'aprender vue 1',
	  		pendiente: true,
	  		editando: false
  		},
  		{
	  		descripcion:'Dormir 2',
	  		pendiente: true,
	  		editando: false
  		},
  		{
	  		descripcion:'Call Elu',
	  		pendiente: false,
	  		editando: false
  		}

  	],
  	name : 'David '
  },
  computed: {
    // a computed getter
    reversedMessage: function () {
      // `this` points to the vm instance
      return this.name.split('').reverse().join('')
    }
  }
}); 