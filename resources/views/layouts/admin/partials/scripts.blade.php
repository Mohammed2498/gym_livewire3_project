 <!-- Core JS -->
 <!-- build:js assets/vendor/js/core.js -->

 <script src="{{ asset('front-assets') }}/vendor/libs/jquery/jquery.js"></script>
 <script src="{{ asset('front-assets') }}/vendor/libs/popper/popper.js"></script>
 <script src="{{ asset('front-assets') }}/vendor/js/bootstrap.js"></script>
 <script src="{{ asset('front-assets') }}/vendor/libs/node-waves/node-waves.js"></script>
 <script src="{{ asset('front-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
 <script src="{{ asset('front-assets') }}/vendor/libs/hammer/hammer.js"></script>

 <script src="{{ asset('front-assets') }}/vendor/js/menu.js"></script>
 <!-- endbuild -->
 <!-- Vendors JS -->
 <!-- Main JS -->
 <script src="{{ asset('front-assets') }}/js/main.js"></script>
 <script>
     document.addEventListener("DOMContentLoaded", () => {
         Livewire.hook('morph.updated', ({
             el,
             component
         }) => {
             const mySuccessAlert = document.querySelector('.me-gengiiii');
             if (mySuccessAlert) {
                 setTimeout(() => {
                     mySuccessAlert.style.display = 'none';
                 }, 2000);
             }
         });
     });

     window.addEventListener('createModalToggle', event => {
         $('#createModal').modal('toggle');
     });

     window.addEventListener('updateModalToggle', event => {
         $('#updateModal').modal('toggle');
     });

     window.addEventListener('deleteModalToggle', event => {
         $('#deleteModal').modal('toggle');
     });

     window.addEventListener('showModalToggle', event => {
         $('#showModal').modal('toggle');
     });

     window.addEventListener('createSubscriptionModalToggle', event => {
         $('#createSubscriptionModal').modal('toggle');
     });

     window.addEventListener('updateRemainingPaymentModalToggle', event => {
         $('#completeRemainingPayment').modal('toggle');
     });
 </script>

 <!-- Page JS -->
