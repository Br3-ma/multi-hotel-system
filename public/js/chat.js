let form = {
  name:document.getElementById("name"),
  email:document.getElementById("email"),
  sendBtn:document.getElementById("start-chat"),
  sendContainer:document.getElementById("sendContainer"),
  emailContainer:document.getElementById("emailContainer"),
  nameContainer:document.getElementById("nameContainer"),
  formContainer:document.getElementById("chat_form")


}


let loader = document.getElementById('chat_loader')
let loadingText = document.getElementById('loadText')
let chatArea = document.getElementsByClassName('chat_area')[0]
let selectionArea = document.querySelector('.selection_area')
let  welcomeText = document.getElementsByClassName("desc-text")[0]
let chatBox = document.getElementsByClassName("chat-box")[0]


form.formContainer.addEventListener('submit',e=>{
     //send the email to the server
     e.preventDefault();
     form.name = document.getElementById("name")
      form.email = document.getElementById("email")
      form.sendBtn = document.getElementById("start-chat")
      form.sendContainer = document.getElementById("sendContainer")
      form.emailContainer = document.getElementById("emailContainer")
      form.nameContainer = document.getElementById("nameContainer")
      form.formContainer = document.getElementById("chat_form")

   loader = document.getElementById('chat_loader')
    loadingText = document.getElementById('loadText')



      chatBox = document.getElementsByClassName("chat-box")[0]
      let requestData = `submit=1&username=${form.name.value}&email=${form.email.value}`

  

    const ajax = new XMLHttpRequest();
     loader.style.display = "flex"
     form.formContainer.style.overflow = "hidden"
   //  loadingText.style.display = "block"
     form.formContainer.style.overflow = "none"
     form.sendBtn.style.display = "none"
         form.email.style.display = "none"
         form.name.style.display = "none"
         form.sendContainer.style.display = "none"
         form.nameContainer.style.display = "none"
         form.emailContainer.style.display = "none"
     welcomeText.innerText = "loading"

    ajax.open('post','chatbot/chat.php',true);
     ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
     ajax.send(requestData);
     ajax.onreadystatechange = function(){
          

      if(this.readyState == 4 && this.status == 200){
        let requestObject = null;
           

        try{
         requestObject = JSON.parse(ajax.responseText)
         //loadingText.style.display = "none"
         
         form.formContainer.style.overflow = "scroll"
         form.formContainer.style.overflowX = "hidden"
         console.log(requestObject)
         console.log(requestObject['name'])
        
  
        }catch(e){
         console.error("could not parse JSON")
       console.warn(this.response)
        form.formContainer.style.overflow = "block"
          form.sendBtn.style.display = "block"
         form.email.style.display = "block"
         form.name.style.display = "block"
         form.sendContainer.style.display = "block"
         form.nameContainer.style.display = "block"
         form.emailContainer.style.display = "block"
        welcomeText.innerText = "Internal server error Please try again or check your connection"
       
        }
  
        if(requestObject == null || requestObject['ok'] == false){
          form.formContainer.style.overflow = "block"
          form.email.value = ""
          form.name.value = ""
       form.sendBtn.style.display = "block"
           form.email.style.display = "block"
           
           form.name.style.display = "block"
           form.sendContainer.style.display = "block"
           form.nameContainer.style.display = "block"
           form.emailContainer.style.display = "block"
       welcomeText.innerText = "Internal server error Please try again or check your connection"
       loader.style.display = "none"
        }else{
         handleResponse(requestObject)
        }

  }
     }
      
    });

   
  

function handleResponse(requestObject){
          
        //replace the form with buttons
        form.formContainer.style.display = "none"
       loader.style.display = "none"
       let client_name = requestObject.name
       let nameLetter = client_name[0].toUpperCase() 
        welcomeText.style.display = "none"
        chatArea.style.display = 'block'
        selectionArea.style.display = 'flex'
        form.formContainer.style.display = "none"
        let chatbot_text_container = document.createElement('div')
        let chatbot_icon = document.createElement('i')
        let chatbot_text = document.createElement('p')
        chatbot_text.className = "chatbot_text"
        chatbot_text.innerText=`hi there ${client_name}, Welcome to asmara hotel how may we help you?`
        chatbot_icon.className = "fas fa-robot"
        chatbot_text_container.id = "chatbot_text_container"

       chatbot_text_container.innerHTML = chatbot_icon.outerHTML + chatbot_text.outerHTML
       chatArea.appendChild(chatbot_text_container)

       
         
       let greet = document.getElementById("greet");
       let about = document.getElementById("about");
       let contact = document.getElementById("contact");
       let location = document.getElementById("location");

       //greet button
        greet.addEventListener('click',(e)=>{
          e.preventDefault()
         //client selection
         let user_text_container = document.createElement('div')
         let user_text = document.createElement('p')
         let user_icon = document.createElement('i')
         user_text_container.id = "user_text_container"
         user_text.className = "user_text"
         user_text.innerText = "hello"
         user_icon.className = "user_icon"
         user_icon.innerText = nameLetter
         user_text_container.appendChild(user_text)
         user_text_container.appendChild(user_icon)
         chatArea.appendChild(user_text_container)
         user_text_container.scrollIntoView()
         //chatbot response
         setTimeout(()=>{
          let chatbot_text_container = document.createElement('div')
          let chatbot_icon = document.createElement('i')
          let chatbot_text = document.createElement('p')
          chatbot_text.className = "chatbot_text"
          chatbot_text.innerText=`hello ${client_name} please select any option below!`
          chatbot_icon.className = "fas fa-robot"
          chatbot_text_container.id = "chatbot_text_container"
  
         chatbot_text_container.innerHTML = chatbot_icon.outerHTML + chatbot_text.outerHTML
         chatArea.appendChild(chatbot_text_container)
         chatbot_text_container.scrollIntoView()
        },2000);
        });

        //about button
        about.addEventListener('click',(e)=>{
          e.preventDefault()
          //client selection
          let user_text_container = document.createElement('div')
          let user_text = document.createElement('p')
          let user_icon = document.createElement('i')
          user_text_container.id = "user_text_container"
          user_text.className = "user_text"
          user_text.innerText = "what is asmara about?"
          user_icon.className = "user_icon"
          user_icon.innerText = nameLetter
          user_text_container.appendChild(user_text)
          user_text_container.appendChild(user_icon)
          chatArea.appendChild(user_text_container)
          user_text_container.scrollIntoView()

          setTimeout(()=>{
            let chatbot_text_container = document.createElement('div')
            let chatbot_icon = document.createElement('i')
            let chatbot_text = document.createElement('p')
            chatbot_text.className = "chatbot_text"
            chatbot_text.innerText=" Asmara Hotel is a Luxuries Hotel with Nature a Hotel Company here to satisfy your accomodaton and luxurious needs. We are a new hotel that just recently opened. Bringing the best out of hotel accomodation services."
            chatbot_icon.className = "fas fa-robot"
            chatbot_text_container.id = "chatbot_text_container"
    
           chatbot_text_container.innerHTML = chatbot_icon.outerHTML + chatbot_text.outerHTML
           chatArea.appendChild(chatbot_text_container)
           chatbot_text_container.scrollIntoView()
          },2000);
          
        });
        //contact button
        contact.addEventListener('click',(e)=>{
          e.preventDefault()
    
          //client selection
          let user_text_container = document.createElement('div')
          let user_text = document.createElement('p')
          let user_icon = document.createElement('i')
          user_text_container.id = "user_text_container"
          user_text.className = "user_text"
          user_text.innerText = "how can i contact asmara hotel?"
          user_icon.className = "user_icon"
          user_icon.innerText = nameLetter
          user_text_container.appendChild(user_text)
          user_text_container.appendChild(user_icon)
          chatArea.appendChild(user_text_container)
          user_text_container.scrollIntoView()
          //chatbot response
          //You can contact us by email at <a href="mailto:asmarahotelzam@gmail.com">asmarahotelzam@gmail.com</a> or give us a call at <a href="tel:0211355875">0211 355 875.</a><br> For Reservations you can send us an email to reservation@asmarahotelzam.com and we will respond promptly.'
          setTimeout(()=>{
            let chatbot_text_container = document.createElement('div')
            let chatbot_icon = document.createElement('i')
            let chatbot_text = document.createElement('p')
            chatbot_text.className = "chatbot_text"
            chatbot_text.innerHTML='You can contact us by email at asmarahotelzam@gmail.com or give us a call at 0211 355 875.<br> For Reservations you can send us an email to reservation@asmarahotelzam.com and we will respond promptly.'
            chatbot_icon.className = "fas fa-robot"
            chatbot_text_container.id = "chatbot_text_container"
    
           chatbot_text_container.appendChild(chatbot_icon)
           chatbot_text_container.appendChild(chatbot_text)
           chatArea.appendChild(chatbot_text_container)
           chatbot_text_container.scrollIntoView()
          },2000);
        });

        //location button
        location.addEventListener('click',(e)=>{
          e.preventDefault()
    
          //client selection
          let user_text_container = document.createElement('div')
          let user_text = document.createElement('p')
          let user_icon = document.createElement('i')
          user_text_container.id = "user_text_container"
          user_text.className = "user_text"
          user_text.innerText = "where is asmara hotel located?"
          user_icon.className = "user_icon"
          user_icon.innerText = nameLetter
          user_text_container.appendChild(user_text)
          user_text_container.appendChild(user_icon)
          chatArea.appendChild(user_text_container)
          user_text_container.scrollIntoView()

          setTimeout(()=>{
            let chatbot_text_container = document.createElement('div')
            let chatbot_icon = document.createElement('i')
            let chatbot_text = document.createElement('p')
            chatbot_text.className = "chatbot_text"
            chatbot_text.innerHTML='You can find us at 5494, Along Lunsemfwa Road, Kalundu,Lusaka, Zambia. Find us using google maps on our contact page.'
            chatbot_icon.className = "fas fa-robot"
            chatbot_text_container.id = "chatbot_text_container"
    
           chatbot_text_container.innerHTML = chatbot_icon.outerHTML + chatbot_text.outerHTML
           chatArea.appendChild(chatbot_text_container)
           chatbot_text_container.scrollIntoView()
          },2000);
        });
      
      
      
      }
