@component('mail::message')

# Thank you for registering with Suwasetha 

Dear {{$SendData->name}},

 We are excited to have you join our community.!
These are the your Profile Details

@component('mail::table')
| User Name              | Email              | Password                 |
| ----------------- | ----------------------- | --------------------------- |
| {{$SendData['name']}} | {{$SendData['email']}} | {{$SendData['password']}} |
@endcomponent

To login to systm please use above mentioned details, please click on the following link:
@component('mail::button', ['url' => 'http://localhost/pharmacyapp/login'])
Blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
