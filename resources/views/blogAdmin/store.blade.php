 <div class="col-lg-4">
     <div class="card section-card h-100">

         <div class="card-header">
             <i class="bi bi-scissors me-2"></i>Nuevo Blog
         </div>

         <div class="card-body">

             <form action="{{ route('blogAdmin.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf

                 <div class="mb-3">
                     <label class="form-label fw-semibold">Titulo</label>
                     <input name="title" type="text" class="form-control" placeholder="Titulo del Blog">
                     @error('title')
                         <small class="text-danger">{{ $message }}</small>
                     @enderror
                 </div>

                 <div class="mb-3">
                     <label class="form-label fw-semibold">Descripción</label>
                     <textarea name="description" class="form-control" rows="3"></textarea>
                 </div>
                 @error('description')
                         <small class="text-danger">{{ $message }}</small>
                @enderror

                 <div class="mb-4">
                     <label class="form-label fw-semibold">Imagen</label>
                     <input name="imagen" type="file" class="form-control">
                     @error('imagen')
                         <small class="text-danger">{{ $message }}</small>
                     @enderror
                 </div>

                 <button class="btn btn-dark w-100 btn-icon">
                     <i class="bi bi-save"></i> Guardar Blog
                 </button>

             </form>

         </div>
     </div>
 </div>
