<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Updated Category</h5>
                </div>
                <div class="modal-body">
                    <form id="update-form">
                    <div class="container">
                        <div class="row">

                            <div class="col-12 p-1">
                                <label class="form-label">Brand Name <span style="color:red;"> *</span></label>
                                <input type="text" class="form-control" id="CategoryNameUpdate">
                            </div>

                            <div class="col-12 p-1">
                                <label class="form-label">Brand Image <span style="color:red;"> *</span></label>
                                <img id="oldImg"src="https://dummyimage.com/300x400/" width="100"height="100">
                                <input type="file"oninput="oldImg.src=window.URL.createObjectURL(this.files[0])" class="form-control" id="categoryImgUpdate">
                                <input type="text" class="d-none" id="updateID">
                                <input type="text" class="d-none" id="filePath">
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                  
                    <button id="update-modal-close"type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>

                    <button onclick="Update()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>
    
    async function FillUpUpdateForm(id,filePath){

document.getElementById('updateID').value=id;
document.getElementById('filePath').value=filePath;
document.getElementById('oldImg').src=filePath;


// showLoader();
let res=await axios.post("/super-admin/category_by_id",{id:id})
// hideLoader();

document.getElementById('CategoryNameUpdate').value=res.data['categoryName'];

}

  async function Update() {

    let CategoryNameUpdate = document.getElementById('CategoryNameUpdate').value;
    let updateID=document.getElementById('updateID').value;
    let filePath=document.getElementById('filePath').value;
    let categoryImgUpdate = document.getElementById('categoryImgUpdate').files[0];


        if (CategoryNameUpdate.length === 0) {
            errorToast("Category Name Required !")
        }
         else{
            document.getElementById('update-modal-close').click();

            let formData=new FormData();
            formData.append('categoryImg',categoryImgUpdate)
            formData.append('id',updateID)
            formData.append('categoryName',CategoryNameUpdate)
            formData.append('file_path',filePath)



            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            // showLoader();
            let res = await axios.post("/super-admin/update-category",formData,config)
            // hideLoader();

            if(res.status===200 && res.data['status']==='success'){
                        document.getElementById("update-form").reset();
                        successToast(res.data['message']);
                        await CategorygetList();
                    }
                    else{
                        errorToast(res.data['message']);
                    }
                        


    }



}



</script>