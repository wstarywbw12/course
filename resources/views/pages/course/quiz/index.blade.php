 <div class="container pb-5">

     <!-- Header -->
     <h2 class="fw-bold mb-3">Kuis Dasar Class Diagram</h2>
     <p class="text-muted mb-4">
         Untuk membantu memahami konsep Class Diagram secara lebih mendalam, berikut kuis singkat
         yang dirancang untuk menguji pemahaman dasar kamu. Setiap pertanyaan berfokus pada elemen-elemen
         penting seperti struktur kelas, atribut, operasi, serta hubungan antarkelas.
     </p>

     <!-- Step -->
     <div class="d-flex gap-2 mb-4">
         <button class="btn step-btn active">1</button>
         <button class="btn step-btn bg-light">2</button>
         <button class="btn step-btn bg-light">3</button>
         <button class="btn step-btn bg-light">4</button>
         <button class="btn step-btn bg-light">5</button>
     </div>

     <!-- Quiz Card -->
     <div class="card quiz-card shadow-sm">
         <div class="card-body p-4">

             <!-- Question -->
             <div class="d-flex mb-4">
                 <div class="step-btn active d-flex justify-content-center align-items-center">1</div>
                 <h6 class="fw-semibold mb-0 align-self-center ms-3">
                     Diagram Kelas termasuk kategori...
                 </h6>
             </div>

             <!-- Options -->
             <div class="vstack gap-2">

                 <div>
                     <input type="radio" name="answer" id="optA" class="option-input">
                     <label for="optA" class="option-card d-flex align-items-center">
                         <div class="option-label">A</div>
                         <span>Diagram Perilaku</span>
                     </label>
                 </div>

                 <div>
                     <input type="radio" name="answer" id="optB" class="option-input">
                     <label for="optB" class="option-card d-flex align-items-center">
                         <div class="option-label">B</div>
                         <span>Diagram Struktural</span>
                     </label>
                 </div>

                 <div>
                     <input type="radio" name="answer" id="optC" class="option-input">
                     <label for="optC" class="option-card d-flex align-items-center">
                         <div class="option-label">C</div>
                         <span>Diagram Implementasi</span>
                     </label>
                 </div>

                 <div>
                     <input type="radio" name="answer" id="optD" class="option-input">
                     <label for="optD" class="option-card d-flex align-items-center">
                         <div class="option-label">D</div>
                         <span>Diagram Interaksi</span>
                     </label>
                 </div>

             </div>


             <!-- Footer Buttons -->
             <div class="d-flex justify-content-end gap-3 mt-5">
                 <button class="btn btn-light px-4" disabled>Back</button>
                 <button class="btn btn-primary px-4">Next</button>
             </div>

         </div>
     </div>

 </div>


 @include('pages.course.quiz.style')