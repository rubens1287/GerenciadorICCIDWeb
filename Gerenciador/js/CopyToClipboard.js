function copy(str) {
		var rangeTeste = document.getElementById(str).innerText;	
		
		var range = rangeTeste.substring(0,rangeTeste.indexOf("Copiar"));
		
		if (window.clipboardData && window.clipboardData.setData) {
        // IE specific code path to prevent textarea being shown while dialog is visible.
        return clipboardData.setData("Text", range); 

    } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = range;
        textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
        document.body.appendChild(textarea);
        textarea.select();
		//var text = document.getElementById(teste);
		//text.onselect() = true;
        try {
            if (document.execCommand("copy")){
				textarea.remove()
				return true;
			} else{
				textarea.remove()
				return false;
			};  // Security exception may be thrown by some browsers.
			
        } catch (ex) {
            console.warn("Copy to clipboard failed.", ex);
            return false;
        } 
    }
}
