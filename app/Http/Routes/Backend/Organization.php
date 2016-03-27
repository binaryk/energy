<?php 

get('organization', 'Organization\OrganizationController@index')->name('admin.organization');
get('organization/create', 'Organization\OrganizationController@create')->name('admin.organization.create');
get('organization/edit/{id}', 'Organization\OrganizationController@edit')->name('admin.organization.edit');

post('organization/update/{id}', 'Organization\OrganizationController@update')->name('admin.organization.update');
post('organization/store', 'Organization\OrganizationController@store')->name('admin.organization.store');
post('organization/destroy/{id}', 'Organization\OrganizationController@destroy')->name('admin.organization.destroy');

get('organization/users/{id}', 'Organization\OrganizationController@users')->name('admin.organization.show.user');
