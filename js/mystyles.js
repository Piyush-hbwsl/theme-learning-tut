let slides = document.querySelectorAll(".slider__slides");
let counter = 0;

console.log(slides);

slides.forEach((slide,index)=>{
    slide.style.left = `${index*100}%`;
});

function transform_the_posts(move){
    if(move==="next"){
        if(counter+1===3){
            console.log("last image");
            return;
        }
        counter+=1;
        slides.forEach((slide,index)=>{
            slide.style.transform = `translateX(-${counter*100}%)`;
        })
    }
    else{
        if(counter==0){
            console.log("first image");
            return;
        }
        counter-=1;
        slides.forEach((slide,index)=>{
            slide.style.transform = `translateX(-${counter*100}%)`;
        })
    }
}


document.getElementById("next").addEventListener('click',()=>{
    transform_the_posts("next");
})

document.getElementById("prev").addEventListener('click',()=>{
    transform_the_posts("prev");
})