//serie di funzioni che permettono delle animazioni nel file about.php
$( document ).ready(function() {  
    $( ".about_p" ).animate({
        margin: "0 1rem",
        opacity:"1",
      }, 2000, function() {
      });
      $( ".about_title" ).animate({
        margin: "0.5rem 1rem",
        opacity:"1",
      }, 2000, function() {
      });
      $( "#image_about" ).animate({
        margin: "0 0 0 -3rem",
        opacity:"1",
      }, 2000, function() {
      });
      $( "#img_team1" ).animate({
        margin: "2rem 0 0 0",
        opacity:"1",
        width:"90%",
      }, 2000, function() {
      });
      $( "#img_team2" ).animate({
        margin: "2rem 0 0 0",
        opacity:"1",
        width:"90%",
      }, 2000, function() {
      });
      $( "#img_team3" ).animate({
        margin: "2rem 0 0 0",
        opacity:"1",
        width:"90%",
      }, 2000, function() {
      });


      $( "#img_team1" ).mouseenter(function() {
        $( this ).animate({
            width: "100%",
            right:"30",
        }, 1000,function() {
        });        
        })
        .mouseleave(function() {
            $( this ).animate({
                width: "90%",
                right:"30",
            }, 500,function() {
            });        
        });      
        
        
        $( "#img_team2" )
        .mouseover(function() {
            $( this ).animate({
                width: "100%",
                right:"30",
              }, 1000,function() {
              }); 
        })
        .mouseout(function() {
            $( this ).animate({
                width: "90%",
                right:"30",
              }, 500,function() {
              });         
            });
    
            $( "#img_team3" )
            .mouseover(function() {
                $( this ).animate({
                    width: "100%",
                    right:"30",
                  }, 1000,function() {
                  }); 
            })
            .mouseout(function() {
                $( this ).animate({
                    width: "90%",
                    right:"30",
                  }, 500,function() {
                  });         
                });
        
});