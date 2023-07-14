import cv2
from keras.models import load_model
from flask import Flask, render_template, Response
import time
from sklearn.preprocessing import LabelEncoder
from keras.utils import to_categorical
from var_dump import var_dump
import mediapipe as mp 
import pickle
import csv
import os
import numpy as np
import pandas as pd
from sklearn.metrics import accuracy_score
import random


app=Flask(__name__)

# //start = time.time()
# time.sleep(10) # sleep for 10 seconds
# end = time.time()

def detek_wajah():
    cap = cv2.VideoCapture(0)
    global label_text
    names=['atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 'atika', 
           'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 'bona', 
           'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 'dinda', 
           'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 'farhan', 
           'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 'ferimmanuel7', 
           'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 'laura', 
           'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 'nadine', 
           'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 'rayna', 
           'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 'rcsmrt', 
           'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan', 'zharfan']
    # label_distr = {i:names.count(i) for i in names}.values()
    # print_data(label_distr, unique)
    le = LabelEncoder()
    le.fit(names)
    labels = le.classes_
    name_vec = le.transform(names)
    categorical_name_vec = to_categorical(name_vec)
    def draw_ped(img, label, x0, y0, xt, yt, color=(255,127,0), text_color=(255,255,255)):
        (w, h), baseline = cv2.getTextSize(label, cv2.FONT_HERSHEY_SIMPLEX, 0.5, 1)
        cv2.rectangle(img,
                    (x0, y0 + baseline),  
                    (max(xt, x0 + w), yt), 
                    color, 
                    2)
        cv2.rectangle(img,
                    (x0, y0 - h),  
                    (x0 + w, y0 + baseline), 
                    color, 
                    -1)  
        cv2.putText(img, 
                    label, 
                    (x0, y0),                   
                    cv2.FONT_HERSHEY_SIMPLEX,     
                    0.5,                          
                    text_color,                
                    1,
                    cv2.LINE_AA) 
        return img
    # --------- load Haar Cascade model -------------
    face_cascade = cv2.CascadeClassifier('haarcascade_frontalface_default.xml')
    # --------- load Keras CNN model -------------
    model = load_model("model-cnn-facerecognition1a.h5")
    print("[INFO] finish load model...")
    
    while cap.isOpened() :
            ret, frame = cap.read()
            if ret:
                gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
                faces = face_cascade.detectMultiScale(gray, 1.1, 5)
                for (x, y, w, h) in faces:
                    
                    face_img = gray[y:y+h, x:x+w]
                    face_img = cv2.resize(face_img, (50, 50))
                    face_img = face_img.reshape(1, 50, 50, 1)
                    
                    result = model.predict(face_img)
                    idx = result.argmax(axis=1)
                    confidence = result.max(axis=1)*100
                    if confidence > 95:
                        label_text1="Dikenali"
                        label_text="%s" % (labels[idx])
                        # print(idx)
                        # print(labels)
                        # print(label_text[0])
                        # var_dump(label_text[2:-2])
                    else :
                        label_text = "N/A"
                        label_text1 = "Tidak Dikenali"
                    frame = draw_ped(frame, label_text1, x, y, x + w, y + h, color=(0,255,255), text_color=(50,50,50))
            
                cv2.imshow('Detect Face', frame)
            else :
                break
            if cv2.waitKey(10) == ord('q'):
                break
    cv2.destroyAllWindows()
    cap.release()


def verify():
    cap = cv2.VideoCapture(0)
    mp_drawing=mp.solutions.drawing_utils
    mp_holistic=mp.solutions.holistic
    
    l=[1,2,3,4]
    pose=random.choice(l)

    with open('face_posefix.pkl', 'rb') as f:
        model=pickle.load(f)

    with mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
        while cap.isOpened():
            global face_pose_class
            ret, frame1=cap.read()
            
            image1=cv2.cvtColor(frame1, cv2.COLOR_BGR2RGB)
            image1.flags.writeable=False
            
            results=holistic.process(image1)
            
            image1.flags.writeable=True
            image1=cv2.cvtColor(image1, cv2.COLOR_RGB2BGR)
            
            mp_drawing.draw_landmarks(image1, results.face_landmarks, mp_holistic.FACEMESH_CONTOURS,
                                    mp_drawing.DrawingSpec(color=(80,110,10), thickness=1, circle_radius=1),
                                    mp_drawing.DrawingSpec(color=(80,256,121), thickness=1, circle_radius=1)
                                    )
            
            try:
                face=results.face_landmarks.landmark
                face_row=list(np.array([[landmark.x, landmark.y, landmark.z, landmark.visibility] for landmark in face]).flatten())
                row=face_row
                x=pd.DataFrame([row])
                face_pose_class=model.predict(x)[0]
                face_pose_prob=model.predict_proba(x)[0]
                if(face_pose_prob[np.argmax(face_pose_prob)]>0.9):
                    face_pose_class=face_pose_class
                else:
                    face_pose_class='Unknown'
                print(face_pose_class, face_pose_prob)

                coords=tuple(np.multiply(
                                np.array(
                                    (results.pose_landmarks.landmark[mp_holistic.PoseLandmark.LEFT_EAR].x,
                                    results.pose_landmarks.landmark[mp_holistic.PoseLandmark.LEFT_EAR].y))
                            ,[640,480]).astype(int))
                
                # cv2.rectangle(image1,
                #             (coords[0], coords[1]+5),
                #             (coords[0]+len(face_pose_class)*20, coords[1]-30),
                #             (245, 117, 16), -1)
                # cv2.putText(image1, face_pose_class, coords,
                #         cv2.FONT_HERSHEY_SIMPLEX, 1, (255,255,255), 2, cv2.LINE_AA)
                
                # cv2.rectangle(image1, (0,0), (250,60),(245, 117, 16), -1)
                # cv2.putText(image1, 'CLASS'
                #             , (95,12), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0,0,0), 1, cv2.LINE_AA)
                # cv2.putText(image1, face_pose_class.split(' ')[0]
                #             , (90,40), cv2.FONT_HERSHEY_SIMPLEX, 1, (255,255,255),2, cv2.LINE_AA)
                if pose==1:
                    text='Silahkan hadap kanan untuk verifikasi'
                elif pose==2:
                    text='Silahkan hadap kiri untuk verifikasi'
                elif pose==3:
                    text='Silahkan buka mulut untuk verifikasi'
                else:
                    text='Silahkan menunduk untuk verifikasi'

                cv2.putText(image1, text
                            , (15,12), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0,0,0), 1, cv2.LINE_AA)
                cv2.putText(image1, 'Posisikan wajah anda di dalam kotak'
                            , (10,40), cv2.FONT_HERSHEY_SIMPLEX, 1, (0,0,0),2, cv2.LINE_AA)
                cv2.rectangle(image1, (220,125),(475,375), (255,0,0), 1)
                # cv2.putText(image1, coords, (250,350), cv2.FONT_HERSHEY_SIMPLEX, 0.4, (0,0,255), 1, cv2.LINE_AA)
                
                    
            except:
                pass  
            
            cv2.imshow('Raw Webcam Feed', image1)
            # if cv2.waitKey(10)&face_pose_prob[np.argmax(face_pose_prob)]>0.9 :
            #     break
                                              
            if cv2.waitKey(10)&0xFF==ord('q'): 
                break
    cap.release()
    cv2.destroyAllWindows() 

            
@app.route('/index2')
def index2():
    return render_template('verify.php')
    

@app.route('/video_verify')
def video_verify():
    return Response((verify()), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/verified')
def verified():
    data1={'Status': face_pose_class}
    return data1
        
@app.route('/index')
def index():    
    return render_template('bayar.php')



@app.route('/video_feed')
def video_feed():
    #Video streaming route. Put this in the src attribute of an img tag
    return Response((detek_wajah()), mimetype='multipart/x-mixed-replace; boundary=frame')





@app.route('/label')
def label():
    data={'name': label_text[2:-2]}
    return data

if __name__ =='__main__':
    app.run(debug=True, port=8080)
        
