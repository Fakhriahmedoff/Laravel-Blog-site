@extends('front.layouts.master')
 @section('title', 'Elaqe')
 @section('bg','https://www.csp.org.uk/sites/default/files/styles/section_index_banner/public/images/2018-08/shutterstock_711824767.jpg?h=25475f90&itok=ron0pDlg') 
@section('content')

      <div class="col-md-8">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}

        </div>
        @endif
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form method="POST" action="{{route('contact.post')}}">
            @csrf
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Subject</label>
                <select class="form-control" name="topic">
                  <option>Bilgi</option>
                  <option>Destek</option>
                  <option>Umumi</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" name="message" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </form>
        </div>
  
      </div>
          <div class="col md-4">
            <div class="card">
              <div class="card-default card-body">
                Adress: bla bla bla <br/>
                Phone : bla bla
              </div>
            </div>
          </div>
    

    
   
  <hr>
@endsection




  <!-- Main Content -->

 

