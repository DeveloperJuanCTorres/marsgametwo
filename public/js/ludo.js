let deactivate
let deid
let declass
const stopage=[1,9,14,22,27,35,40,48]
class Player{
    constructor(el,start,end,stripStart){
        this.playerStatus= false
        this.winnerid=new Array(4).fill(false)
        this.color=el
        this.status = new Array(4).fill(false)
        this.id = new Array(4)
        this.start=start
        this.stripStart = stripStart
        this.end=end
        let elements = document.getElementsByClassName(el)
        for(let i = 0; i < elements.length; i++)
            {
                var index = elements[i].getAttribute('data-key');
                this.id[index]=elements[i]
                // console.log(this.id[i])
                // console.log(this.id[i].id)
            }
        
        this.steps = new Array(4).fill(0)
        }
    setsubStatus(i){
        this.status[i]=false
    }
    setSteps(i){
        this.steps[i]=0
    }
    checkStatus(){
        let flag =false
        for(let i=0; i<4; i++){
            if(this.status[i]==true){
                flag = true
            }
           
        }
        if(flag==false){
            this.playerStatus=false
        }
    }
    
    setStatus(){
        this.playerStatus=true
    }
    getStatus(){
        return this.playerStatus
    }
    getElementStatus(val){
        return this.status[val]
    }

    activatePlayer(){
        for(let i=0; i<4; i++){
            console.log( this.id[i]);
            this.id[i].disabled=false
            this.id[i].classList.add("btnzoom")
            console.log(this.id[i])
        }
        btn.disabled=false
        return
    }
    openMove(el){
        for(let i = 0; i<4; i++){
            if(this.id[i].id==el){
                this.status[i]=true
                console.log(this.id[i])
                let ele = document.getElementById(this.start)
 
                console.log(ele)
               
                ele.appendChild(this.id[i])
            }
        }
        for(let i=0;i<4; i++){
            this.id[i].disabled=true
            this.id[i].classList.remove("btnzoom")
        }
    }
    enableBtn(){
        console.log('enableBtn');
        for(let i=0;i<4; i++){
            if(this.status[i]==true){
                this.id[i].disabled=false
                this.id[i].classList.add("btnzoom")
            }
        }
    }
    movePlayer(el,val,nextColor){
        let dest=0
        let fl=false
            for(let i = 0; i<4; i++){
                if(this.id[i].id==el){
                    this.status[i]=true
                    this.id[i].classList.remove("btnzoom")
                    console.log(this.id[i])

                    this.steps[i]+=val

                    
                    this.id[i].classList.remove("btnzoom")
                    dest = this.start+this.steps[i]
                    if(this.steps[i]>50){
                        if(this.steps[i]>56){
                            this.steps[i]-=val
                            break 
                        }
                        else if(this.steps[i]==56){
                            
                            let winel = document.getElementById("win")
                            winel.appendChild(this.id[i])
                            
                            winel.lastElementChild.classList.add("red1")

                            this.winnerid[i]=true
                            
                            for(let i=0;i<4; i++){
                                if(this.winnerid[i]==false){
                                    fl=true
                                }
                            }
                            if(fl==false){
                                console.log("won"+this.color)
                                alert(this.color + " Player Won !!! ...please refresh to start New Game")
                            }
                            break
                        }
                        dest = (this.steps[i]-50)+this.stripStart
                    }
                    else if(dest>52){
                        dest = dest-52
                    }
                    console.log(this.steps[i])
                    let ele = document.getElementById(dest)
                    console.log(ele)


                    //Guardar moviento debajo del 6 
                    let position = this.id[i].getAttribute('data-list');
                    let keyFicha = this.id[i].getAttribute('data-key');
                    draughts[position].position = ele.id;
                    draughts[position].status = 1;
                    Livewire.dispatch('move', {move: draughts, color:nextColor, jump:val, line:el, square:ele.id, eat:keyFicha});
                    //-------------
                    
                    
                    let lastChild = ele.lastElementChild


                  
                    
                    if(lastChild==null || lastChild.className==this.color || stopage.includes(ele.id)){
                        ele.appendChild(this.id[i])
                    }
                    
                    else {
                        let clname = lastChild.className
                        clname = clname.toString()
                        clname = clname.slice(0,clname.indexOf(' '))
                        if(clname=="props"){
                            ele.appendChild(this.id[i])
                        }
                        else{
                            let initialPlace = document.getElementById(lastChild.className + lastChild.id)
                            deactivate=true
                            declass=lastChild.className
                            deid=lastChild.id
                            initialPlace.appendChild(lastChild)
                            ele.appendChild(this.id[i])
                        }
                    }
                    
                }
            }
            for(let i=0;i<4; i++){
                this.id[i].classList.remove("btnzoom")
                this.id[i].disabled=true
            }
        return
    }
}



function deactivateSubPlayer(){
    if(deactivate==true){
        if(declass=="red"){
            red.setsubStatus(parseInt(deid)-101)
            red.setSteps(parseInt(deid)-101)
            red.checkStatus()
            deactivate=false
        }
        else if(declass=="yellow"){
            yellow.setsubStatus(parseInt(deid)-201)
            yellow.setSteps(parseInt(deid)-201)
            yellow.checkStatus()
            deactivate=false
        }
        // else if(declass=="blue"){
        //     blue.setsubStatus(parseInt(deid)-301)
        //     blue.setSteps(parseInt(deid)-301)
        //     blue.checkStatus()
        //     deactivate=false
        // }
        // else if(declass=="green"){
        //     green.setsubStatus(parseInt(deid)-401)
        //     green.setSteps(parseInt(deid)-401)
        //     green.checkStatus()
        //     deactivate=false
        // }
    }
    else{
        return
    }
}


//declaración
function adddice(dice){
    return new Promise(resolve =>{
        setTimeout(() =>{
            let goti = document.getElementById("goti")
            goti.style.backgroundImage = 'url('+image.get(dice)+')'
        resolve("resolved")
    },1000)
        
    })
}
function removezoom(active){
    return new Promise(resolve =>{
        setTimeout(() => {
            let ani = document.getElementById(active)
            ani.classList.remove("zoom")
        resolve("resolved")
        }, 500);
    })
}


function createParts(pieces){
    console.log(pieces);
    for(i=0; i< pieces.length; i++){
        const square = document.getElementById(`${pieces[i].position}`);
        var button = document.createElement("button")
        button.classList.add("btn-ludo");
        button.classList.add(pieces[i].color);
        button.setAttribute('id',pieces[i].id);
        button.setAttribute('data-key',pieces[i].key);
        button.setAttribute('data-list',i)
        button.setAttribute('onclick',`move(${pieces[i].id})`);
        button.disabled = true;
        button.textContent = pieces[i].value;
        square.appendChild(button);
    }
  }

  function activeStatus(pieces){
    for(i=0; i< pieces.length; i++){
        if(red.color == pieces[i].color){
            if(pieces[i].status === 1){
                red.status[pieces[i].key]=true;
                red.setStatus();
                // red.steps[pieces[i].key]=4;
                //  red.id[(pieces[i].key)].classList.add("btnzoom")
            } 
        }
        if(yellow.color == pieces[i].color){
            if(pieces[i].status === 1){
                yellow.status[pieces[i].key]=true;
                yellow.setStatus();
            } 
        }
     }

     console.log('***********Yellow Status***********')
     console.log(yellow.status)
     console.log(yellow.id)
  }

    //declaracion del color que inicia

    let red;
    let yellow;
    // let blue;
    // let green ;
    let image;


    let die =0
    let active = ""
    let btn = document.getElementById("roll");
    var draughts;

    function changeColor(move,color){

        let idSquare = move['square'];
        let jump = move['jump'];
        let ficha = move['line'];

        if(jump != ''){
            const node = document.getElementById(ficha);
            const casilla = document.getElementById(`${idSquare}`);
            while (casilla.firstChild) {
                casilla.removeChild(casilla.firstChild);
              }
              casilla.appendChild(node);
        }

       

        let ani = document.getElementById(active)
        ani.classList.remove("zoom")
        active = color;

    }

    function playGame(pieces,playercolor){

        draughts = pieces;
        createParts(pieces);
        active = playercolor;
        message(active);
        red = new Player("red",1,51,109)
        yellow = new Player("yellow",14,12,209)
        activeStatus(pieces);

        console.log(yellow);

        // blue = new Player("blue",27,25,309)
        // green = new Player("green",40,38,409)
        image = new Map([
            [1, "https://i.postimg.cc/CM60tqym/1.jpg"],
            [2, "https://i.postimg.cc/JhKvkfMP/2.jpg"],
            [3, "https://i.postimg.cc/3NZnspN9/3.jpg"],
            [4, "https://i.postimg.cc/Px7tmpT3/4.jpg"],
            [5, "https://i.postimg.cc/pTCs7zpC/5.jpg"],
            [6, "https://i.postimg.cc/SKD8brfn/6.jpg"],
            [7, "https://i.postimg.cc/90qqTj59/dice.gif"]
        ]);

    }

    async function generaterandom(){
        // message(active)
        btn.disabled=true
        console.log(active)
        let dice = Math.floor(Math.random()*6)+1
        let goti = document.getElementById("goti")
        goti.style.backgroundImage = 'url('+image.get(7)+')'
        goti.textContent=""

        console.log('***************');
        await adddice(dice)
        await removezoom(active)
        die=dice
        console.log('resultado:');
        console.log(die)
    
        activePlayer(die);
    }


function message(msg){
    console.log('message');
    let ani = document.getElementById(msg)
    console.log(ani)
    ani.classList.add("zoom")
    let goti = document.getElementById("goti")
    goti.style.backgroundImage=""
    goti.textContent="Tirar dados"
    let el = document.getElementById("roll")
    el.value=msg + "'s turn"
}


function activePlayer(dice){
    
    console.log('activePlayer')

    if(active === "red"){
        
        if(dice===6){
            console.log('*op-6');
            red.activatePlayer()
            red.setStatus()
        }
        else if(red.getStatus()===false){
            console.log('*No hay movimineto');
            //Guardar registro cuando no hay movimiento ;
            Livewire.dispatch('move', {move: draughts, color:"yellow", jump:0, line:"", square:"", eat:0});
            document.getElementById('boardDiv').classList.add('elementor-toggle');
            //-------------
            active = "yellow"
            message(active)
            btn.disabled=false;
        }
        else{
            console.log('*Hay movimineto de una ficha ya activa');
            red.enableBtn()
            console.log(red);
        }
        console.log('active -*-*')
        console.log(active)
        // document.getElementById('boardDiv').classList.add('elementor-toggle');
    }
    else if(active === "yellow"){
        if(dice===6){
            yellow.activatePlayer()
            yellow.setStatus()
        }
        else if(yellow.getStatus()===false){
            //Guardar registro cuando no hay movimiento ;
            console.log('*No hay movimineto');
            //Guardar registro cuando no hay movimiento ;
            Livewire.dispatch('move', {move: draughts, color:"red", jump:0, line:"", square:"", eat:0});
            document.getElementById('boardDiv').classList.add('elementor-toggle');
            //-------------
            active = "red"
            message(active)
            btn.disabled=false;
        }
        else{
            yellow.enableBtn()
        }
        console.log(active)
        // document.getElementById('boardDiv').classList.add('elementor-toggle');
    }
    // else if(active === "blue"){
    //     if(dice===6){
    //         blue.activatePlayer()
    //         blue.setStatus()
    //     }
    //     else if(blue.getStatus()===false){
    //         active = "green"
    //         message(active)
    //         btn.disabled=false
    //     }
    //     else{
    //         blue.enableBtn()
    //     }
    //     console.log(active)
        
       
    // }
    // else if(active === "green"){
    //     if(dice===6){
    //         green.activatePlayer()
    //         green.setStatus()

    //     }
    //     else if(green.getStatus()===false){
    //         active = "red"
    //         message(active)
    //         btn.disabled=false
    //     }
    //     else{
    //         green.enableBtn()
    //     }
    //     console.log(active)
    // }
}

// function move(event){
function move(id){
    // event.preventDefault();
    // var id = event.target.id;
    switch (active){
        case 'red':
            if(red.getElementStatus(id-101)==false){
                red.openMove(id)
                die=0
            }
            else{
                console.log("red")
                red.movePlayer(id,die,"yellow")
                deactivateSubPlayer()
                active = "yellow"
                message(active)
            }
            break
        case 'yellow':
            if(yellow.getElementStatus(id-201)==false){
                yellow.openMove(id)
                die=0
            }
            else{
                console.log("yel")
                yellow.movePlayer(id,die,"red")
                deactivateSubPlayer()
                active = "red"
                message(active)
            }
            break
        // case 'blue':
        //     if(blue.getElementStatus(id-301)==false){
        //         blue.openMove(id)
        //         die=0

        //     }
        //     else{
        //         console.log("blu")
        //         blue.movePlayer(id,die)
        //         deactivateSubPlayer()
        //         active = "green"
        //         message(active)
        //     }
        //     console.log(active)
        //     break
        // case 'green':
        //     if(green.getElementStatus(id-401)==false){
        //         green.openMove(id)
        //         die=0

        //     }
        //     else{
        //         console.log("gree")
        //         green.movePlayer(id,die)
        //         deactivateSubPlayer()
        //         active = "red"
        //         message(active)
        //     }
        //     console.log(active)
        //     break
        
    }
    btn.disabled=false
    
}