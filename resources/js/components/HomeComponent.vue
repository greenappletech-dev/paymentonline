<template>

<div class="pad">
  <div class="d-flex justify-content-center">
        
	<form v-on:submit="paymentSubmit">
	
		<div class="row">
            <div class="col-xl-11 col-sm-12 mt-3">
  
                <div class="row">
                    <div class="col-12 p-1 rounded-top text-center mb-3" style="background: #0E723E;">
                        <h4 style="font-weight: 600; color:#fff;">Account Details</h4>
                    </div>
                </div>
                <!--        ENTITY PROJECT LINE            -->
               
                <div class="row d-flex justify-content-start">
                    <div class="col-xl-6 col-sm-12 p-1">
                        <label class="medium-text">District</label>
                        <select class="input-custom form-control small-text" v-on:change="btn_location($event)" v-model="location"  id="district" required>
                            <option class="small-text" v-for="dist in districtTable" v-bind:value="dist.id">{{dist.name}}</option>
                        </select>
                    </div>
                    <div class="col-xl-6 col-sm-12 p-1">
                        <label class="medium-text">Entity Project</label>
                        <select class="input-custom form-control small-text" v-model="select_project" id="project_id"  required>
                            <option class="small-text" v-for="project in projectTable" v-bind:value="project.id">{{project.name}}</option>
                        </select>
                    </div>
  
                </div>
                <!------- ACCOUNT NUMBER LINE ---------->
                <div class="row">
                    <div class="col-xl-12 col-sm-12 p-1">
                        <label class="medium-text" style="margin: 0">BIN</label>
                        <input type="text" class="input-custom form-control small-text mb-2 mt-2"  v-on:blur="CheckBinifExist()" v-model="account_number" id="account_number" placeholder="BIN" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 p-1">
                        <label class="medium-text" style="margin: 0">Account Name </label>
                        <input type="text" class="input-custom mt-2 form-control small-text mb-2" v-model="client_name" id="client_name" placeholder="Surname, Firstname M." readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 p-1">
                        <label class="medium-text" style="margin: 0">Mobile Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="small-text input-custom prepend d-flex align-items-center">
                                    +63
                                </div>
                            </div>
                            <input type="number" class="input-custom form-control small-text" v-on:change="btn_length($event)" id="count_number" v-bind:value="phone_number" placeholder="9XX-XXX-XXXX" >
                        </div>
  
                    </div> 
                </div>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 p-1">
                        <label class="medium-text" style="margin: 0">Email <span style="color: #636e72">(Required)</span></label>
                        <input type="email" class="input-custom mt-2 form-control small-text mb-2" v-model="email" placeholder="@gmail.com"  required>
                    </div>
                </div>
				<div class="row">
                    
						<label class="medium-text">Amount to Pay</label>
  
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="small-text input-custom prepend d-flex align-items-center" style="padding-right: 20px; padding-left: 20px">
                                    ₱
                                </div>
                            </div>
  
                            <input type="number" class="input-custom form-control small-text" v-on:blur="btn_change()" id="amount" v-bind:value="amount"  required>
                        </div>
                </div>
				
				
				
  
  
            </div>
			
			<div class="col-xl-11 col-sm-12 mt-3" style="margin-top:20px!">
					<div class="row">
                    
						<label class="medium-text">Select Payment Method</label>
  
                        <table style="width:100%" border="0">
							<tr>
								<td>
									<div class="radio">
										<label>
										  <input type="radio" name="payment_method" v-model="payment_method" id="bank_account"  value="bank_account" >
											&nbsp;&nbsp;Bank Account
										</label>
									</div>
								</td>
								<td>
									<div class="radio">
										<label>
										  <input type="radio" name="payment_method" v-model="payment_method"  id="e_wallet" value="e_wallet" >
											&nbsp;&nbsp;E-Wallet
										</label>
									</div>
								</td>
								
							</tr>
						</table>
						
						
					</div>
				
		   </div>
			
			
				
           <div class="col-xl-11 col-sm-12 mt-3" style="margin-top:10px !important;margin-bottom:25px !important">
				<div class="row">
					<!--<button class="btn btn-block btn-primary btn-lg" v-on:click="btnpayment()">show modal</button>-->
					<button type="submit" class="btn btn-block btn-primary btn-lg">Submit</button>
				</div>
		   </div>
		  
		   
  
        </div>
		
		
		 </form>
		
  
    </div>
	
	
	<div id="maturedAccountModal" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg">
			<!-- Modal content-->
			<div class="modal-content" >
			  <div class="modal-body">
				<div style="margin-top:30px">
					<div class="msgcontent">
						<p>Maganda Araw. Ang iyong account ay<br>
						nangangailangan ng karagdagang pagsusuri<br> 
						mula sa NHA. Mangyari lamang na magpunta sa<br>
						pinakamalapit na NHA Office upang maayos<br>
						ang iyong bayarin.</p>
				
						
					</div><br>
					<center><p style="font-size:40px;font-weight:600;line-height:40px">Maraming Salamat Po.</p></center>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
			  </div>
			 
			</div>
		  </div>
	 </div>
	
</div>
	
	
	
	
  
  </template>

<script>
    export default {
        props:['district','mode_payment'],

        data(){
            return{
                phone_number:"",
                account_number:"",
                select_project:"",
                client_name:"",
                location:"",
                payment_type:"",
                con_fee: 0,
                districtTable:this.district,
                total: 0,
                email:"",
                billing_number:"",
				payment_method:null,
                amount:"",
                projectTable:[],
                paymentTable:this.mode_payment
            }
        },
        computed:{
            
				btn_total(){
				
				if(this.amount>=1){
					return parseInt(this.amount)+this.con_fee;
					// console.log(this.total);
				}
			  },
		},
        methods:{
		
		
           btn_length(e){
            
            let count=document.getElementById("count_number");
            let field = e.target.value;
            let count_length = field.length

            if(count_length >10){
              alert('Mobile number must be 10 digits only');
              count.value = "";
              
            }else{
                this.phone_number = field;
            }

            // console.log(count);
          },
          btn_location(e){
                this.location = e.target.value;
                axios.get('project/'+e.target.value)
                .then(response=>{
                    this.projectTable=response.data.data;
                })
          },
          btn_convie(e){
            this.payment_type = e.target.value;
            
            axios.get('pay_type/'+ this.payment_type)
            .then(response =>{
                this.con_fee = response.data.data.convenience_fee;
                // console.log(this.con_fee);
            })
            
          },
          btn_change(){
           
			   let amount = document.getElementById('amount').value;
			   
			   if(amount == ""){
				 this.total=0;
				 this.amount=0;
			   }
			   else if(amount <= 0 ){
				alert('less than P 1.00 cannot accept');
				 this.total=0;
				 this.amount=0;
				 return 0;
				 return false;
			   }
			   else if(amount>=1){
			   this.amount = amount;
			   this.total = parseInt(amount)+this.con_fee;
			   }
           
         },
		 CheckBinifExist(){
           
				let account_number = document.getElementById('account_number').value;
				let district = document.getElementById('district').value;
				let project_id = document.getElementById('project_id').value;
				//let bin_name = document.getElementById('client_name');
				
				
				if(district == ""){
				
					alert('Please select district');
					return false;
				}
				
				if(project_id == "" ){
				
					alert('Please select project');
					return false;
				}
				
				if(account_number == ""){
				
					alert('Please Input BIN ID');
					return false;
				}
			
				console.log(account_number);
			    console.log(district);
				console.log(project_id);
			 
				 axios.post('checkBIN_id',{
				  account_number:account_number,
				  district:district,
				  project_id:project_id,
				})
				.then(response=>{
					
					
					console.log(response.data.msg);
					
					if(response.data.msg == "error"){
						this.client_name = "";
						alert(response.data.display_mesage);
						return false;
					}			  
					else{
						this.client_name = response.data.data.full_name;
					}
					
					
				  
				  
				})
				.catch(error=>{
					if(error.response.status === 400){
						this.$fire({
						title: "Error",
						text: error.response.data.error,
						type: "error",
						timer: 3000
						})
					}
				})
			 
			 
           
         },
		 
         btnpayment(e){
	
					
					
			
			return false;
            let total = document.getElementById('total').value;
            this.total = total;
            axios.post('add',{
              account_number:this.account_number,
              phone_number:this.phone_number,
              client_name:this.client_name,
              location:this.location,
              email:this.email,
              select_project:this.select_project,
              // billing_number:this.billing_number,
              amount: this.total,
			  //con_fee: this.con_fee,
              payment_type: this.payment_type,

            })
            .then(response=>{

              // console.log(response.data.base);


              location.href='payment_redirect/'+ response.data.base;
              // if(response.data.data === 'success')
              // {
              // // this.$fire({
              // //         title: 'Success',
              // //         text: 'Successfully saved all data',
              // //         type: 'success',
              // //         timer: 3000
              // // })
              // }
              
            })
            .catch(error=>{
                if(error.response.status === 400){
                    this.$fire({
                    title: "Error",
                    text: error.response.data.error,
                    type: "error",
                    timer: 3000
                    })
                }
            })
			
			
          },
		  paymentSubmit(e){
		   
		   e.preventDefault() // Prevent page from reloading.
				
					
					
			
					
					let amount = this.btn_change();
					if(amount == 0){
						return false;
					}
					
					
					let payment_method = this.payment_method;
					
					if(payment_method == null){
				
						alert("Please Select Payment Method");
						return false;
						
					}
					

					 axios.post('add',{
					  bin_id:this.account_number,
					  benefeciary:this.client_name,
					  phone_number:this.phone_number,
					  district:this.location,
					  email:this.email,
					  project:this.select_project,
					  amount: this.total,
					  amount: this.total,
					  payment_method : this.payment_method,
					})
					.then(response=>{
					
					if(response.data.msg == "ismatured")
					{
					
						
						
						$('#maturedAccountModal').modal('show'); 
						return false;
						
					}
					
					
					if(response.data.msg == "error"){
					
					
						alert(response.data.display_mesage);
						//this.client_name="";
						
						
						
						
						return false;
					}
					
					else if(response.data.msg  == "no_data"){
						alert(response.data.display_mesage);
						return false;
					}
					
					else if(response.data.msg  == "success"){
						window.location.href = response.data.url;
						return false;
					}
				
					
					console.log(response.data);

					console.log(response.data.msg);
					 
						//window.location.href = response.data;
						
					  // console.log(response.data.base);
					  // if(response.data.data === 'success')
					  // {
					  // // this.$fire({
					  // //         title: 'Success',
					  // //         text: 'Successfully saved all data',
					  // //         type: 'success',
					  // //         timer: 3000
					  // // })
					  // }
					  
					  
					  
					  
					})
					.catch(error=>{
						if(error.response.status === 400){
							this.$fire({
							title: "Error",
							text: error.response.data.error,
							type: "error",
							timer: 3000
							})
						}
					})
			
			
			
		  },
		  
		  
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
.pad{
    padding-left: 40px;
    padding-right: 0px;
}

  img {
    width: 100%;
    height: 100%;
  }
  .main{
  
    height:500px;
    width: 50%;
    border-radius: 5px;
  }
  
  button {
      padding: 15px 50px;
      border: none;
      border-collapse: collapse;
      border-radius: 5px;
      color: white;
      background: #0d6aaa;
      font-size: 13px;
      outline: none;
  }
  
  input[type="text"] {
      font-size: 13px;
      padding: 15px;
      outline: none;
  }
  
  input[type="text"]:focus {
      outline: none;
  }
  
  .select-custom {
      padding: 13px;
  }
  
  .small-text {
      font-size: 13px;
  }
  
  .medium-text {
      font-size: 14px;
  }
  
  .input-custom {
      height: 40px;
      background: #ECECEC;
  }
  
  .prepend {
  
      border: 1px solid #ced4da;
      vertical-align: center;
      padding: 10px;
      color: #6c758f;
      border-radius: 5px 0 0 5px;
  
  }
  
  .msgcontent{
	

	margin-left:130px;
	font-size:26px;
	font-weight:600;
	line-height:40px
  }
  
  @media screen and (max-width: 1199px){
    .pad{
        padding-left: 10px;
    }
    h5{
        font-size: 15px;
    }
  }
  
  @media screen and (max-width: 500px){
    .msgcontent{
	

		margin-left:10px;
		font-size:26px;
		font-weight:600;
		line-height:40px
	  }
	  
	  .modal {
			
		top: 0 !important;
	}
  }
  
  
  	.modal-content {
		
		border : 7px solid red !important;
		
	}
			
	.modal {
			
		top: 160 !important;
	}
  </style>

