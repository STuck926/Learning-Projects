import tkinter
from tkinter import ttk
from tkinter import messagebox
import tkinter.messagebox

def enter_data():
    accepted = accept_var.get()

    if accepted =="Accepted":
        # User info
        firstName = first_name_entry.get()
        lastName = last_name_entry.get()
        if firstName and lastName:
            title = title_combobox.get()
            age = age_spinbox.get()
            nationality = nationality_combobox.get()
            
            # Course info
            reg_status = reg_status_var.get()
            numcourses = numcourses_spinbox.get()
            numsemesters = numsemesters_spinbox.get()
            print("First name:", firstName, "Last name:", lastName)
            print("Title:", title, "Age:", age, "Nationality:", nationality)
            print("Registration Status: ", reg_status)
            print("# Courses:", numcourses, "# Semesters:", numsemesters)
            print("--------------------------------------")
        else:
            tkinter.messagebox.showwarning(title="Error", message="First name and Last name are required.")
    else:
        tkinter.messagebox.showwarning(title="Error", message="You have not accepted terms.")


# -----Beginning of window creation----- #
window = tkinter.Tk()
window.title("Data Entry Form")

# Main window frame
frame = tkinter.Frame(window)
frame.pack()

# User info
user_info_frame = tkinter.LabelFrame(frame, text="User Information")
user_info_frame.grid(row=0, column=0, padx=20, pady=10)

first_name_label = tkinter.Label(user_info_frame, text="First Name")
first_name_label.grid(row=0, column=0)

first_name_entry = tkinter.Entry(user_info_frame)
first_name_entry.grid(row=1,column=0)


last_name_label = tkinter.Label(user_info_frame, text="Last Name")
last_name_label.grid(row=0, column=1)

last_name_entry = tkinter.Entry(user_info_frame)
last_name_entry.grid(row=1, column=1)

title_label = tkinter.Label(user_info_frame, text="Title")
title_label.grid(row=0, column=2)

title_combobox = ttk.Combobox(user_info_frame, values=["", "Mr.", "Ms.", "Mrs.", "Dr."])
title_combobox.grid(row=1,column=2)

age_label = tkinter.Label(user_info_frame, text="Age")
age_label.grid(row=2, column=0)

age_spinbox = tkinter.Spinbox(user_info_frame, from_=18, to=110)
age_spinbox.grid(row=3, column=0)

nationality_label = tkinter.Label(user_info_frame, text="Nationality")
nationality_label.grid(row=2, column=1)

nationality_combobox = ttk.Combobox(user_info_frame, values=["", "American", "Mexican", "Canadian"])
nationality_combobox.grid(row=3, column=1)

for widget in user_info_frame.winfo_children():
    widget.grid_configure(padx=10, pady=5)

# Course registration info
courses_frame = tkinter.LabelFrame(frame, text="Registration Information")
courses_frame.grid(row=1, column=0, sticky="news", padx=20, pady=10)

registered_label = tkinter.Label(courses_frame, text="Registration Status")
registered_label.grid(row=0, column=0)

reg_status_var = tkinter.StringVar(value="Not registered")
registered_check = tkinter.Checkbutton(courses_frame, text="Currently Registered", variable=reg_status_var, 
                                       onvalue="Registered", offvalue="Not registered")
registered_check.grid(row=1, column=0)

numcourses_label = tkinter.Label(courses_frame, text="# of Completed Courses")
numcourses_label.grid(row=0, column=1)

numcourses_spinbox = tkinter.Spinbox(courses_frame, from_=0, to="infinity")
numcourses_spinbox.grid(row=1, column=1)

numsemesters_label = tkinter.Label(courses_frame, text="# of semesters")
numsemesters_label.grid(row=0, column=2)

numsemesters_spinbox = tkinter.Spinbox(courses_frame, from_=0, to="infinity")
numsemesters_spinbox.grid(row=1, column=2)

for widget in courses_frame.winfo_children():
    widget.grid_configure(padx=10, pady=5)

# Accept terms

terms_frame = tkinter.LabelFrame(frame, text="Terms & Conditions")
terms_frame.grid(row=2,column=0, sticky="news", padx=20, pady=10)

accept_var = tkinter.StringVar(value="Not Accepted")
terms_check = tkinter.Checkbutton(terms_frame, text="I accept the terms and conditions.", variable=accept_var, onvalue="Accepted", offvalue="Not Accepted")
terms_check.grid(row=0,column=0)

# Enter button
button = tkinter.Button(frame, text="Enter data", command=enter_data)
button.grid(row=3, column=0)

# -----End of window creation----- #
window.mainloop()
