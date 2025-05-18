var slide = document.querySelectorAll('.slide');
        var btns= document.querySelectorAll('.btn');
        let currentSlide = 1;

        //manua slide

        var manualNav = function(manual){
            slide.forEach((slide)=>{
                slide.classList.remove('active');

                btns.forEach((btn)=>{
                    btn.classList.remove('active');
                });
            });

            slide[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i)=> {
            btn.addEventListener("click", ()=>{
                manualNav(i);
                currentSlide = i;
            });
        });

           // slider autoplay
        var repeat = function(activeClass){
            let active = document.getElementsByClassName('active');
            let i = 1;

            var repeater = () => {
                setTimeout(function(){
                    [...active].forEach((activeSlide)=>{
                       activeSlide.classList.remove('active');
                    })

                slide[i].classList.add('active');
                btns[i].classList.add('active');
                i++;

                if(slide.length == i){
                    i = 0;
                }
               if(i >= slide.length){
                     return;
                }

                repeater();
                }, 3000);
            }
            repeater();
        }
        repeat();