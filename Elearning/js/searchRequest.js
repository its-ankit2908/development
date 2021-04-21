var searchData = [];

$.ajax({
    url:"getCourse.php",
    method:"POST",
    dataType:"json",
    data:{ course:'hello' },
    success: function(data){
        console.log(data);
        searchData = [...data,];
        const searchWrapper = document.querySelector('.search-input');
        const inputbox  = searchWrapper.querySelector('input');
        const suggbox = searchWrapper.querySelector('.autocom-box');
        
        inputbox.onkeyup = (e)=>{
            let userData = e.target.value;
            let emptyArray = [];
            if(userData)
            {
                emptyArray = searchData.filter((data)=>{
                    return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()); 
                });
               
                emptyArray = emptyArray.map((data)=>{
                    return data = `<form action="searchCourse.php" method="post">
                                      <input type="hidden" value="${data}" id="search_course" name="search_course" />  
                                      <input type="submit" class="search-item" value='${data}'/>
                                    </form>`;
                });
                console.log(emptyArray);
                searchWrapper.classList.add('active');
                showSuggestions(emptyArray);
                let allList = suggbox.querySelectorAll('li');
                for(let i=0; i< allList.length;i++)
                {
                    allList[i].setAttribute('onclick',"select(this)");
                }        
            }else{
                
                searchWrapper.classList.remove('active');
                 
            }
                    
        }

        function select(element){
            let selectUserData = element.textContent;
             inputbox.value = selectUserData;
             searchWrapper.classList.remove('active');
         
         }
         
         
         function showSuggestions(list)
         {
             let listData;
             if(!list.length){
                 
                 let userValue = inputbox.value;
                 listData = '<li>'+userValue+'</li>';
         
             }else{
                 listData = list.join('');
             }
             
             suggbox.innerHTML = listData;
         }



    },

    error: function(err){
        console.log('error occured',err);
    },

})



const searchWrapper = document.querySelector('.search-input');
const inputbox  = searchWrapper.querySelector('input');
const suggbox = searchWrapper.querySelector('.autocom-box');

function select(element){
    let selectUserData = element.textContent;
     inputbox.value = selectUserData;
     searchWrapper.classList.remove('active');
 
 }

console.log(searchData);