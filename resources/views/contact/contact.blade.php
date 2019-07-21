@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Contact' }}

@endsection

@section('content')
    @include('includes.mainNavbar')

    <div class="container mainContainer shadow-sm p-3 mb-5 bg-white rounded">
        <div class="contactContent">
            <div class="contact shadow-lg p-3 mb-5 bg-white rounded">
                <div class="contactForm">
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" aria-describedby="emailHelp"
                                   placeholder="Enter your email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                anyone
                                else.
                            </small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your message title">
                        </div>

                        <div class="form-group">
                        <textarea name="message" class="form-control" cols="30" rows="10"
                                  placeholder="Contact us and ask any question you have, we will try to respond within 24 hours. Use the form for business purposes by adding *BUSINESS* word at the start of the title (including **)."></textarea>
                        </div>
                        <button type="submit" class="btn contactBtn btn-outline-success contactButton">Send</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection