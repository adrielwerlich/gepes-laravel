// require('./bootstrap');
// window.Vue = require('vue');



class GepesJsControl{
    constructor() {
        console.log('constructor')
        this.el = {}
        // ************ BOTOES E LINKS *******************
        // this.el.btnShowAboutNesef = document.getElementById('btn-show-nesef')
        // this.el.btnShowLines = document.getElementById('btn-lines')
        this.el.btn1 = document.getElementById('bt-view-1')

        this.el.btnView = document.querySelectorAll('.btnView')


        // ############ ELEMENTOS BLOCOS DIV NESEF #############

        this.el.newsCarousel = document.getElementById('news-slider')

        // this.el.jumbo = document.getElementById('jumbo')
        // this.el.logo = document.getElementsByClassName('imglogo')[0]

        // this.el.events = document.getElementById('nesef-events')
        // this.el.aboutNesef = document.getElementById('about-nesef')
        // this.el.lines = document.getElementById('research-lines')


        this.elementsPrototype()
        this.initEvents()
    }

    initEvents(){
        console.log('initEvents')

        // console.log(this.el.btn1)

        // this.el.btnView.addEventListener('click', e => {
        //     console.log('this.el.btnview click')
        //     this.el.newsCarousel.hide();
        // })

        // this.el.btnShowLines.addEventListener('click', e => {
        //     this.el.lines.show()

        //     this.el.jumbo.hide()
        //     this.el.logo.hide()
        //     this.el.aboutNesef.hide()
        //     this.el.events.hide();
        // })
    }

    elementsPrototype() {
        Element.prototype.hide = function () {
            this.style.display = 'none'
            return this
        }
        Element.prototype.show = function () {
            this.style.display = 'block'
            return this
        }
        Element.prototype.toggle = function () {
            
            this.style.display = (this.style.display === 'none') ? 'block' : 'none'
            return this
        }
        Element.prototype.on = function (events, fn) {
            events.split(' ').forEach(event => {
                this.el.addEventListener(event, fn)
                //(exemplo para digitar no console) app.el.btnNewContact.on('click mouseover dblclick', (event) => {console.log('evento do botão newContact >>> ', event.type)})
            })
            return this
        }
    }

}
window.gepesJsControl = new GepesJsControl()


const carousel = document.getElementById('news-slider')
const wraper = document.getElementById('wraper')
const btnBack = document.getElementById('btn-back-begin-div')
let elements = new Set()
const quemSomos = {}

let form = document.getElementById('form-contato')
let divMap = document.getElementById('map-content')




function manchete(manchete) {
    console.log(manchete)
    id = manchete.id
    tema = manchete.tema
    titulo = manchete.titulo
    desc = manchete.descricao

    createAndShowDiv(id, tema, titulo, desc)
}

function createAndShowDiv(id, tema, titulo, desc) {

    let div = document.createElement('div')

    div.innerHTML = 
    `
        <h2 id="tema"> ${tema} </h2> 
        <hr>
        <h3 id="titulo"> ${titulo} </h3>
        <article id="corpo" style="font-size:18px"> ${desc} </article>
    `

    let localImg = copyImgEl(id)

    div.appendChild(localImg)

    div.id = 'manchete-wraper' + id
    div.classList.add('manchete-grid')

    let btnBack = document.createElement('div')
    btnBack.innerHTML = 
    `
        <button class="btn-lg btn-info" id="btn-back-begin"> Voltar </button>
    `
    btnBack.id = 'btn-back-begin-div'
    btnBack.className = 'col-xs-12'
    btnBack.style.display = 'grid'

    btnBack.addEventListener('click', e => {
        console.log('btnback onclick', e)
        carousel.style.display = 'block'
        wraper.style.display = 'none'
    })

    div.appendChild(btnBack)

    appendEl(div)

    return div
}

function copyImgEl(id) {
    let img = document.getElementById('img-'+id)
    let localImg = img.cloneNode(true)
    localImg.style = 'max-width: 100%; max-height: 200px; grid-row: 3/5; grid-column: 5/7;'

    return localImg
}

function showManchete(e){
    
    // debugger 

    let btn = e.currentTarget
    let id = btn.dataset['id']


    let elId = 'manchete-wraper' + id
    
    let localEl = document.getElementById(elId)
    if (localEl)
        return
    

    for(let element of elements) {
        // console.log('value', element)

        if (element.id == elId) {
            appendEl(element)
            return false;
        }

    }


    let tema = btn.dataset['tema']
    let titulo = btn.dataset['tit']
    let desc = btn.dataset['desc']

    div = createAndShowDiv(id, tema, titulo, desc)


    elements.add(div)

}

function appendEl(div){
    
    carousel.style.display = 'none'

    while (wraper.firstChild) {
        wraper.removeChild(wraper.firstChild);
    }

    wraper.appendChild(div)

    wraper.style.display = 'block'
}

$('.card').on('click', e => {
    console.log('card click')
    // console.log(e.currentTarget)
    showManchete(e)
})



$('.btn-view').on('click', e => {
    console.log('btn view click')
    // console.log(e.currentTarget)
    // debugger
    e.stopPropagation()
    showManchete(e)
    // let modelTit = document.querySelector('.modal-body #tit') // modal.find('.modal-body #tit')//.val(titulo)
    // console.log(modelTit)
    // modal.find('.modal-body #desc').val(desc)
    // modal.find('.modal-body #link').val(link)
    // modal.find('modal-body #tit').val(titulo)
})

// Initialize and add the map
function initMap() {
    
    console.log('entrou no initMap')

    // The location of Uluru
    let uluru = {lat: -27.82344495623004, lng: -50.316685438156135};
    // The map, centered at Uluru
    let divMap = document.getElementById('map')
    let map = new google.maps.Map(
        divMap, {zoom: 18, center: uluru});
        
    // The marker, positioned at Uluru
    let marker = new google.maps.Marker({position: uluru, map: map});

    
}

function showMap(){
    console.log('entrou no show map')
    wraper.style.display = 'none'
    // btnBack.style.display = 'none'
    carousel.style.display = 'none'
    form.style.display = 'none'
    
    divMap.style.display = 'block'
}

function mostraFormContato(){

    console.log('entrou no form contato')
    console.log(form)
    form.style.display = 'block'

    carousel.style.display = 'none'
    wraper.style.display = 'none'
    // btnBack.style.display = 'none'
    divMap.style.display = 'none'


}
























// document.getElementById('btn-back-begin').on('click', e => {
//     console.log('withouth jquey')
// })

// document.getElementById('btn-back-begin-div').on('click', e => {
//     console.log('withouth jquey with div')
// })

// $('#btn-back-begin-div').on('click', e => {
//     console.log(e)
//     carousel.style.display = 'block'
//     wraper.style.display = 'none'
// })
