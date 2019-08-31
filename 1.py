import json

datadiri = {'biodata' : {
    'name' : 'M. Hafizh Anbiya',
    'age' : 23,
    'address' : 'Rajabasa, Bandar Lampung',
    'hobbies' : ['Coding', 'Sport'],
    'is_married' : False,
    'list_school' : [{
        'name' : 'Universitas Lampung',
        'year_in' : 2015,
        'year_out' : 2019,
        'major' : 'Teknik Informatika'
    }],
    'skills' : [{
        'skill_name' : 'Programming',
        'level' : ['Beginner', 'Advanced', 'Expert']
    }],
    'interest_in_coding' : True
}}

j = json.dumps(datadiri, indent=2)

print(j)