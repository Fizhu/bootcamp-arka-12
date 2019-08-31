import re

def is_username_valid(username):
    abc = username[0]
    efg = re.search('[A-Z]', abc)
    hij = re.search('[a-z]', abc)
    if(len(username)>=5):
        if(len(username)<=9):
            if re.search('[A-Z]', username):
                if re.search('[a-z]', username):
                    if re.search('[0-9]', username):
                        if(efg):
                            print("True")
                        elif(hij):
                            print("True")
                        else:
                            print("false")
                    else:
                        print("False")
                else:
                    print("False")
            else:
                print("False")
        else:
            print("False")
    else:
        print("False")

def is_password_valid(password):
    if(len(password)>=8):
        if re.search('[A-Z]', password):
            if re.search('[a-z]', password):
                if re.search('[0-9]', password):
                    if re.search("[!@#$%^&*_+.,/();':=]", password):
                        if re.search('[=]', password):
                            print("True")
                        else:
                            print("False")
                    else:
                        print("False")
                else:
                    print("False")
            else:
                print("False")
        else:
            print("False")
    else:
        print("False")

is_username_valid('Xrutaf888')
is_username_valid('1Diana')
is_password_valid('passW0rd=')
is_password_valid('C0d3YourFuture!#')