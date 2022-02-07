/*card maison*/


Vue.component('themeCard', {
    inheritAttrs: false,
    props: ['todo'],

    template: `
    
    <div class="card mt-5 h-80 border-top-0 border-0" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{todo.title}}</h5>     
      <p class="card-text">{{todo.paragraphe}}</p>
      <h6 class="card-subtitle mb-2 text-muted">{{todo.subtitle}}</h6>
      <a href="#" class="btn  btn-sm  mt-2" style="background-color: #0a3a5b;">{{todo.avent}}</a>
    </div>
  </div>
  
    `
})


var cardChoice = new Vue({

    el: '#card-choice',

    data: {
        processList: [
            { id: 0, title: 'Vous souhaitez acheter?', subtitle: 'cliquez sur ce lien', paragraphe: 'Cherchez un bien qui vous fait rever !', subtitle: 'cliquez sur ce lien', avent:'Cliquez ici' },
            { id: 1, title: 'Vous souhaitez louer?', subtitle: 'cliquez sur ce lien', paragraphe: 'Cherchez la location qui vous correspond !', avent:'Cliquez ici' },
            { id: 2, title: 'Vous souhaitez vendre?', subtitle: 'cliquez sur ce lien', paragraphe: 'Deposez votre annonce !', avent:'Cliquez ici'},           
        ]
    }
})






Vue.component('themeCardAgain', {
  inheritAttrs: false,
  props: ['todo'],

  template: `
  
  <div class="card mt-5 h-80 border-top-0 border-0" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{todo.title}}</h5>     
    <p class="card-text">{{todo.paragraphe}}</p>
    <h6 class="card-subtitle mb-2 text-muted">{{todo.subtitle}}</h6>
    <a href="#" class="btn  btn-sm  mt-2" style="background-color: #0a3a5b;">Cliquez ici </a>
  </div>
</div>

  `
})


var cardChoiceAgain = new Vue({

  el: '#card-choice-again',

  data: {
      processList: [
          { id: 0, title: 'Vous souhaitez acheter?', subtitle: 'cliquez sur ce lien', paragraphe: 'Cherchez un bien qui vous fait rever !', subtitle: 'cliquez sur ce lien' },
          { id: 1, title: 'Vous souhaitez louer?', subtitle: 'cliquez sur ce lien', paragraphe: 'Cherchez la location qui vous correspond !' },
          { id: 2, title: 'Vous souhaitez vendre?', subtitle: 'cliquez sur ce lien', paragraphe: 'Deposez votre annonce !'},           
      ]
  }
})






document.getElementById("menuDeroulant").addEventListener("mouseover", mouseOverMenu);
document.getElementById("menuDeroulant").addEventListener("mouseout", mouseOutMenu);
document.getElementsByClassName("sousmenu");

function mouseOverMenu() {
  $('.sousmenu').show(); 
}
function mouseOutMenu() {
    $('.sousmenu').hide();
}