<div class="tags-input">

    <x-forms.label name="input-tags" label="Tags" />
    <input type="text" name="input-tags" class="rounded-xl bg-white/15 border border-white/50 px-5 py-4 w-full"
        id="input-tags" placeholder="Enter tag name and press enter" />
    <ul id="tags" class="mt-5"></ul>
    <input type="hidden" value="[]" name="hidden-input-tags" id="hidden-input-tags">

</div>

<aside>
    <p class="bg-red-600 hidden" id="warnings">Max of 20 characters, only characters and three tags please</p>
</aside>


<script>
    const tags = document.getElementById('tags');
    const input = document.getElementById('input-tags');
    const hiddenInput = document.getElementById('hidden-input-tags');
    const warnings = document.getElementById('warnings');
    var tagArray = [];

    function changeWarning() {
        if (warnings.style.display == "block") {
            warnings.style.display = "none";
        }
        return;
    }

    function updateHiddenInput(tagArray) {
        console.log(tagArray);
        hiddenInput.value=tagArray;
        return
    }


    // Add an event listener for click on the tags list
    tags.addEventListener('click', function(event) {
        event.preventDefault();
        changeWarning()

        updateHiddenInput(tagArray);
        // If the clicked element has the class 'delete-button'
        if (event.target.classList.contains('delete-button')) {
            // Remove the parent element (the tag)
            //remove from array
            const tagContent = event.target.innerText;
            console.log(tagContent);
            const index = tagArray.indexOf(tagContent);
            tagArray.splice(index, 1);
            event.target.remove();
        }
        if (event.target.classList.contains('delete-button-svg')) {
            const tagContent = event.target.parentNode.innerText;
            const index = tagArray.indexOf(tagContent);
            tagArray.splice(index, 1);
            event.target.parentNode.remove();
            event.target.remove();
        }
    });

    // Add an event listener for keydown on the input element
    input.addEventListener('keydown', function(event) {
        changeWarning()
        // Check if the key pressed is 'Enter'
        if (event.key === 'Enter') {

            // Prevent the default action of the keypress
            // event (submitting the form)
            event.preventDefault();

            // Get the trimmed value of the input element
            const tagContent = input.value.trim().toLowerCase();
            //check length, array length and only characters
            if (tags.children.length > 2 || tagContent.length > 20 || !(/^[A-Za-z]+$/.test(tagContent))) {
                warnings.style.display = "block";
                return;
            }

            // If the trimmed value is not an empty string and is not already in array
            if (tagContent !== '' && tagArray.indexOf(tagContent) === -1) {

                //add to array
                tagArray.push(tagContent);
                updateHiddenInput(tagArray);
                const tag = document.createElement('button');
                tag.classList =
                    "delete-button inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800";
                tag.innerHTML = tagContent;
                tag.innerHTML +=
                    '<svg class="delete-button-svg h-5 w-5 text-white" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="18" y1="6" x2="6" y2="18" />  <line x1="6" y1="6" x2="18" y2="18" /></svg>';

                // Append the tag to the tags list

                tags.appendChild(tag);

                // Clear the input element's value
                input.value = '';
            }
        }
    });
</script>
