
//data the app uses
let model = {
  currentCat: null,
  displayAdmin: false,
  cats:[{
    name:'catImg',
    img:'images/catImg.jpg',
    timesClicked:0,
  },
  {
    name:'chewy',
    img:'images/chewy.jpg',
    timesClicked:0,
  },
  {
    name:'jetske',
    img:'images/jetske.jpg',
    timesClicked:0,
  }],
}

//controller that connects model and views
let octopus = {
  init: function(){
    //set current cat to first cat in model
    model.currentCat = model.cats[0]
    //initialize List of cats
    catListView.init()
    //initialize current cat image
    catView.init()
    adminView.init()
  },
  //returns data for current cat
  getCurrentCat: function(){
    return model.currentCat
  },
  //returns call cats in model
  getCats: function(){
    return model.cats
  },
  //change currentCat
  setCurrentCat: function(cat){
    model.currentCat = cat
  },
  //increases timesClicked for current cat
  inccrementCounter: function(){
    model.currentCat.timesClicked++
    if(model.displayAdmin){
      adminView.render()
    }
    catView.render()
  },
  getAdminViewState: function(){
    return model.displayAdmin
  },
  openAdminView: function(){
    model.displayAdmin = true
    adminView.render()
  },
  closeAdminView: function(){
    model.displayAdmin = false
    adminView.hide()
  },
  updateCat:function(name, img, timesClicked){
    model.currentCat.name = name
    model.currentCat.img = img
    model.currentCat.timesClicked = timesClicked
    adminView.hide()
    catView.render()
    catListView.render()
  }

}
let adminView = {
  init: function(){
    this.adminDiv = document.getElementById('admin')
    this.adminBtnElem = document.getElementById('adminBtn')
    this.catNameElem = document.getElementById('catName')
    this.catImgURLElem = document.getElementById('catImgURL')
    this.catClickCountElem = document.getElementById('catClickCount')

    this.cancleBtn = document.getElementById('cancleBtn')
    this.updateCatBtn = document.getElementById('saveBtn')

    this.adminBtnElem.addEventListener('click', function(){
      if(octopus.getAdminViewState()){
        octopus.closeAdminView()
      }else{
        octopus.openAdminView()
      }
    })

    this.cancleBtn.addEventListener('click',function(){

      octopus.closeAdminView()
    })

    this.updateCatBtn.addEventListener('click',function(){
      let name = document.getElementById('catName').value
      let img =  document.getElementById('catImgURL').value
      let timesClicked  = document.getElementById('catClickCount').value
      octopus.updateCat(name, img, timesClicked)

    })
      octopus.closeAdminView()
  },
  render: function(){
    this.adminDiv.style.display = 'block'
    let currentCat =  octopus.getCurrentCat()
    this.catNameElem.value = currentCat.name
    this.catImgURLElem.value = currentCat.img
    this.catClickCountElem.value = currentCat.timesClicked
  },
  hide: function(){
    this.adminDiv.style.display = 'none'
  },

}
let catView = {
  init: function(){
    // store pointers to our DOM elements for easy access later
    this.catElem = document.getElementById('mainCat')
    this.catNameElm = document.getElementById('cat-name')
    this.timesClickedElm = document.getElementById('timesClicked')
    this.catImgElem = document.getElementById('catImg')

    this.catImgElem.addEventListener('click',function(){
      octopus.inccrementCounter()
    })

    this.render()
  },
  render: function(){
    //update currentCat
    let currentCat = octopus.getCurrentCat()
    this.timesClickedElm.textContent = currentCat.timesClicked
    this.catNameElm.textContent = currentCat.name
    this.catImgElem.src  =  currentCat.img
  }
}

//render cat list
let catListView = {
  init: function(){
    this.catListElem = document.getElementById('catList')
    this.render()
  },
  render: function(){
    //get all cats
    let cats = octopus.getCats()
    //clear data from catList elemnet
    this.catListElem.innerHTML = ''

    //loop over all cats and create list item for each cat
    cats.forEach(cat =>{
      var elem = document.createElement('li')
      elem.classList.add('catListItem')
      elem.textContent = cat.name
      elem.addEventListener('click', (function(cat){
        return function(){
          octopus.setCurrentCat(cat)
          catView.render()
      };
    })(cat))
    //add cat to catList element
      this.catListElem.appendChild(elem)
    })

  }
}

//start application
octopus.init()
