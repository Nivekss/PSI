var Dashboard = new Vue({
    el: '#Dashboard',
    data: {
        clients: 0,
        projects: [],
        sharedProjects: [],
        tasks: 0
    },
    ready: function () {
        this.getClients();
        this.getProjects();
        this.getSharedProjects();
        this.getTasks();
    },
    computed: {},
    methods: {
        getClients: function(){
            $.get( window.baseurl + "/api/clients/true", function( results ) {
                Dashboard.clients = results.data.length;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        getProjects: function(){
            $.get( window.baseurl + "/api/projects", function( results ) {
                Dashboard.projects = results.data;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        getSharedProjects: function(){
            $.get( window.baseurl + "/api/projects/shared", function( results ) {
                Dashboard.sharedProjects = results.data;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
        getTasks: function(){
            $.get( window.baseurl + "/api/tasks", function( results ) {
                Dashboard.tasks = results.data.length;
            }).fail(function(e){
                console.log( "error "+ e );
            });
        },
    }
});

