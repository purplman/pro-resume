<script>
    let btn = document.querySelector('#addBlock')
    btn.addEventListener('click', e => {
        e.preventDefault()
        let block = document.querySelector('.block')
        let blockWrapper = document.querySelector('.block-wrapper')
        let newBlock = block.cloneNode(true)
        newBlock.childNodes[1].childNodes[1].childNodes[1].childNodes[3].value = '' // this dives deep into the skill block element to find the damn input element and reset its value -_-
        newBlock.childNodes[1].childNodes[3].childNodes[1].childNodes[3].value = '' // and this one does the same thing for resetting value of the select element
        blockWrapper.append(newBlock)
    } )
</script>