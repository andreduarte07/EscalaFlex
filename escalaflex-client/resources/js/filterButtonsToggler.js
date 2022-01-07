let buttons = $(".filter-button");


buttons.click(function buttonToggler(event){
    let buttonClicked = event.target;
    for (let i=0; i< buttons.length; i++){
        let button = buttons[i];
        
        button.classList.remove("active", "btn-orange");
        button.classList.add("btn-light");
    }
    
    buttonClicked.classList.remove("btn-light");
    buttonClicked.classList.add("active","btn-orange");
    });



// function that sorts table elements by class name
function sortTableByName(className){
    
    
    let table = document.querySelector(".table tbody");
    let unorderedRows = table.querySelectorAll("tr");
    
    let orderedRows = [];
    
    // goes through all the unordered list elements and puts them on their ordered position
    for (let i = 0; i < unorderedRows.length; i++){
        let row = unorderedRows[i];
        
        let nameTd = row.querySelector("." + className);
         
        let name = nameTd.textContent;

        let hasAdded = false
        // goes through all the ordered list elements and 
        for (let j = 0; j < orderedRows.length; j++) {
            let nameToCompare = orderedRows[j].querySelector("." + className).textContent;
            

            if (name < nameToCompare){
                orderedRows.splice(j, 0, row)
                hasAdded = true
                break
            }
        }
        if (!hasAdded){
            orderedRows.push(row)
        }

        table.innerHTML = "";

        for (let i = 0; i < orderedRows.length; i++) {
            const row = orderedRows[i];
            table.appendChild(row);
        }
    }
}




