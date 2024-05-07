<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
    <div class="row text-center align-items-center flex-row-reverse">
      <div class="col-lg-auto ms-lg-auto">
        <ul class="list-inline list-inline-dots mb-0">
          <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
          <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
          <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
          <li class="list-inline-item">
            <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
              <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
              </svg>
              Sponsor
            </a>
          </li>
        </ul>
      </div>
      <div class="col-12 col-lg-auto mt-3 mt-lg-0">
        <ul class="list-inline list-inline-dots mb-0">
          <li class="list-inline-item">
            Copyright &copy; 2023
            <a href="." class="link-secondary">Bitz Studio</a>.
            All rights reserved.
          </li>
          <li class="list-inline-item">
            <a href="./changelog.html" class="link-secondary" rel="noopener">
              v1.0.0-beta19
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<!-- Libs JS -->
<!-- <script src="{{ asset('assets/dist/libs/list.js?1684106062') }}" defer></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/dist/libs/nouislider/dist/nouislider.min.js?1684106062') }}" defer></script>
<script src="{{ asset('assets/dist/libs/litepicker/dist/litepicker.js?1684106062') }}" defer></script>
<script src="{{ asset('assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>
<!-- Tabler Core -->
<!-- <script src="./dist/js/tabler.min.js?1684106062" defer></script> -->
<!-- <script src="./dist/js/demo.min.js?1684106062" defer></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable -->
<script>
    let table = new DataTable('#myTable');
</script>

<!-- New Input Add -->
<script type="text/javascript">
  $("#rowAdder").click(function() {
    if ($('#newhobby .row').length < 5) {
        let newRowAdd =
            '<div class="row"> <div class="input-group">' +
            '<div class="input-group-prepend">' +
            '<button style="margin-top:5px" class="btn btn-lime w-100 mt-1 removeRow" type="button">Remove</button> </div>' +
            '<input type="text" class="form-control m-input mt-1" name="hobbies[]"> </div> </div>';

        $('#newhobby').append(newRowAdd);
    } else {
        // Alert or handle when the limit is reached
        alert("You can only add up to 5 fields.");
    }
  });
  $("body").on("click", "#RmoveRow", function() {
    $(this).parents("#row").remove();
  })

   document.addEventListener("DOMContentLoaded", function () {
    	var el;
    	window.TomSelect && (new TomSelect(el = document.getElementById('select-tags'), {
    		copyClassesToDropdown: false,
    		dropdownParent: 'body',
    		controlInput: '<input>',
    		render:{
    			item: function(data,escape) {
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>';
    			},
    			option: function(data,escape){
    				if( data.customProperties ){
    					return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
    				}
    				return '<div>' + escape(data.text) + '</div>'; 
    			},
    		},
    	}));
    });
</script>
</body>

</html>