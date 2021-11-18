  function slide(){

                var li=$('ul#latest-news-slider li.active');

                if(li.next().length>0 )
                {
                    li.removeClass('active', 3000, "easeInBack");
                    li.next().addClass('active', 3000, "easeInBack");

                }else if(li.prev().length>0){
                   li.removeClass('active', 3000, "easeInBack");
                   $('ul#latest-news-slider li').first('li').addClass('active', 3000, "easeInBack");
                }else
                {
                    return;
                }
            }
            
            $('.next').click(function(){
             
                var li=$('ul#latest-news-slider li.active');

                if(li.next().length>0 )
                {
                    li.removeClass('active', 100, "easeInBack");
                    li.next().addClass('active', 100, "easeInBack");

                }else {
                   li.removeClass('active', 100, "easeInBack");
                   $('ul#latest-news-slider li').first('li').addClass('active', 100, "easeInBack");
                }
            });

            $('.prev').click(function(){
                
                var li=$('ul#latest-news-slider li.active');

                if(li.prev().length>0 && li.prev().is("li"))
                {
                    li.removeClass('active', 100, "easeInBack");
                    li.prev().addClass('active', 100, "easeInBack");

                }else {
                   
                }
            });