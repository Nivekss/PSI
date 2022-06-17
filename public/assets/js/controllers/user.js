var userObj = new Vue({
    el: '#user',
    data: {
        users: [],
        user: null,
        newUser: {full_name: null, email: null, password: null},
        delete_text: null,
        msg: {error: null, success: null},
    },

    ready: function(){
        this.getUser();
    },

    methods: {
        getUser: function(){
            $.get( window.baseurl + "/api/user", function( result ) {
                userObj.user = result;
            });
        },
        update: function(event){
            if(event !== undefined) {
                event.preventDefault();
            }

            var data = this.user;

            $.ajax({
                type: "POST",
                url: window.baseurl + "/api/user/"+data.id,
                data: data,
                success: function(result){
                    if(result.message != "Your changes have been saved"){
                        userObj.msg.error = result.message;
                        userObj.msg.success = null;
                        return false;
                    }
                    userObj.msg.success = result.message;
                    userObj.msg.error = null
                },
                error: function(e){
                    // do nothing
                }
            });
        },
        create: function(new_user, update){    
            $.ajax({
              type: 'POST',
              url: window.baseurl + "/admin/",
              data: {
                email: new_user.email,
                password: new_user.password
            },
              error: function(e) {
                var response = jQuery.parseJSON(e.responseText);
                  $('.new-user .status-msg').text("")
                                              .removeClass('success-msg')
                                              .addClass("error-msg")
                                              .text(response.message);			    
                  return false;
              },
    
              success: function(result){			  		  	
                  $('.new-user .status-msg').text("")
                                              .removeClass('remove-msg')		  								
                                              .addClass("success-msg")
                                              .text(result.message);
                            
        		  		

                  new_user.email = null;
                  new_user.password = null;
                $('.popup-form.new-user').find('input[type=text],textarea,select').filter(':visible:first').focus();
              }
            }); 
        },
        showCreateForm: function(){
            this.msg.success = null;
            this.msg.error = null;
            this.user = null;
            $(".new-user").show();
            $(".new-user .first").focus();
        },
        showUserEditForm: function(currentUser){
            this.user.email = currentUser.email;
            this.user.password = currentUser.password;
            this.msg.success = null;
            this.msg.error = null;
            this.user = null;
            $(".edit-user").show();
            $(".edit-user .first").focus();
        },
        delete: function(){
            showSheet();
            makePrompt("Are you sure you want to delete your account","This action is irreversible","No now", "Yes");

            $("#cancel-btn").click(function(){
                closePrompt();
            });

            $("#confirm-btn").click(function(){
                $.ajax({
                    type: "DELETE",
                    url: window.baseurl + "/api/user/",
                    success: function(result){
                        document.location.href="/";
                    },
                    error: function(e){
                        closePrompt();
                    }
                });
            });
        }
    }

});