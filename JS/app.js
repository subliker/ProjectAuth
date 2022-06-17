let popUp = document.querySelector('.pop_up'),
dAD = document.querySelector('.dragAndDrop'),
types = ['image/jpeg','image/png'],
dADBtn = document.querySelector('.dragAndDropBtn'),
dADSbm = document.querySelector('.dragAndDropSubmit'),
dADErr = document.querySelector('.dragAndDropErr')

const changePhoto = () =>{
    popUp.style.display = 'flex'
}

dAD.addEventListener('dragenter',(e) =>{
    e.preventDefault()
    dAD.classList.add('active')
})
dAD.addEventListener('dragleave',(e) =>{
    e.preventDefault()
    dAD.classList.remove('active')
})
dAD.addEventListener('dragover',(e)=>{
    e.preventDefault()
})
dAD.addEventListener('drop',(e)=>{
    e.preventDefault()
    let files = e.dataTransfer.files
    if(files.length === 1){
        let file = files[0]
        if(types.includes(file.type)){
            dADErr.style.display = 'none'
            let formData = new FormData
            formData.append(0,file)
            fetch('/ProjectAuth/core/addavatar.php',{
                method: 'POST',
                body: formData
        })
            location.reload()
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