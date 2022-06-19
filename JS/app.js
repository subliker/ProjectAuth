let popUp = document.querySelector('.pop_up'),
dAD = document.querySelector('.dragAndDrop'),
types = ['image/jpeg','image/png'],
dADBtn = document.querySelector('.dragAndDropBtn'),
dADSbm = document.querySelector('.dragAndDropSubmit'),
dADErr = document.querySelector('.dragAndDropErr'),
dADC = document.querySelector('dragAndDropChild')

const dADHighlight = () =>{
    dAD.classList.add('active')
}

const changePhoto = (status) =>{
    if(status){
        popUp.style.display = 'flex'
    }
    else{
        popUp.style.display = 'none'
    }
}

dAD.addEventListener('click',(e) =>{
    dADBtn.click()
    e.stopPropagation()
})
dAD.addEventListener('dragover',(e) =>{
    e.preventDefault()
})
dAD.addEventListener('dragenter',(e) =>{
    dADHighlight()
    e.preventDefault()
})
dAD.addEventListener('dragleave',(e) =>{
    e.preventDefault()
    dAD.classList.remove('active')
})
dAD.addEventListener('drop',(e)=>{
    e.preventDefault()
    let files = e.dataTransfer.files
    if(files.length === 1){
        let file = files[0]
        if(types.includes(file.type) & file.size <= 90000){
            dADErr.style.display = 'none'
            let formData = new FormData
            formData.append(0,file)
            fetch('/ProjectAuth/core/addavatar.php',{
                method: 'POST',
                body: formData
        })
            //location.reload()
        }else{
            dADErr.style.display = 'inherit'
        }
        
    }
    else{
        
        dADErr.style.display = 'inherit'
    }
})

const uploadClickDAD = () =>{
    if (dADBtn.files.length){
        dADSbm.click()
    }
}